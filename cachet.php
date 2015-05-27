<?php
namespace DivineOmega\CachetPHP;

class CachetPHP
{
    private $baseURL = '';
    private $email = '';
    private $password = '';
    private $apiToken = '';
    
    public function __construct()
    {
        
    }
    
    public function setBaseURL($baseURL)
    {
        $this->baseURL = $baseURL;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
    }
    
    public function setApiToken($apiToken)
    {
        $this->apiToken = $apiToken;
    }
    
    private function sanityCheck($authorisationRequired)
    {
        if (!$this->baseURL)
        {
            throw new Exception('cachet.php: The base URL is not set for your cachet instance. Set one with the setBaseURL method.');
        }
        else if ($authorisationRequired && (!$this->apiToken && (!$this->email || !$this->password)))
        {
            console.log('cachet.php: The apiToken is not set for your cachet instance. Set one with the setApiToken method. Alternatively, set your email and password with the setEmail and setPassword methods respectively.');
            return false;
        }
    }
    
    private function get($type)
    {
        if ($type!=='components' && $type!=='incidents' && $type!=='metrics')
        {
            throw new Exception('cachet.php: Invalid type specfied. Must be \'components\', \'incidents\' or \'metrics\'.');
        }
        
        $this->sanityCheck(false);
        
        $url = $this->baseURL . $type;
        
        $ch = curl_init($url);
        
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        if (!$response) throw new \Exception('cachet.php: No response from '.$url);
        
        $data = json_decode($response);
        
        if (!$data) throw new \Exception('cachet.php: Could not decode JSON from '.$url);
        
        if (isset($data->data))
        {
            $data = $data->data;
        }
        
        return $data;
    }
    
    private function getByID($type, $id)
    {
        if ($type!=='components' && $type!=='incidents' && $type!=='metrics')
        {
            throw new \Exception('cachet.php: Invalid type specfied. Must be \'components\', \'incidents\' or \'metrics\'.');
        }
        
        $this->sanityCheck(false);
        
        $url = $this->baseURL . $type . '/' . $id;
        
        $ch = curl_init($url);
        
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        if (!$response) throw new \Exception('cachet.php: No response from '.$url);
        
        $data = json_decode($response);
        
        if (!$data) throw new \Exception('cachet.php: Could not decode JSON from '.$url);
        
        if (isset($data->data))
        {
            $data = $data->data;
        }
        
        return $data;
    }
    
    public function setComponentStatusByID($id, $status)
    {
        $this->sanityCheck(true);
        
        if (!$id)
        {
            throw new \Exception('cachet.php: You attempted to set a component status by ID without specifying an ID.');
        }
        
        $url = $this->baseURL . 'components/' . $id;
        
        $requestData = 'status='.$status;

        $ch = curl_init($url);
        
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $requestData);
        
        $authorisationHeader = 'Authorization: Basic ' + base64_encode($this->email + ":" + $this->password);
        
        if ($this->apiToken)
        {
            $authorisationHeader = 'X-Cachet-Token: '.$this->apiToken;
        }
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, array($authorisationHeader));
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        if (!$response) throw new \Exception('cachet.php: No response from '.$url);
        
        $data = json_decode($response);
        
        if (!$data) throw new \Exception('cachet.php: Could not decode JSON from '.$url);
        
        if (isset($data->data))
        {
            $data = $data->data;
        }
        
        return $data;
        
    }
    
    public function getComponents()
    {
        return $this->get('components');
    }
    
    public function getComponentByID($id)
    {
        return $this->getByID('components', $id);
    }
    
    public function getIncidents()
    {
        return $this->get('incidents');
    }
    
    public function getIncidentByID($id)
    {
        return $this->getByID('incidents', $id);
    }
    
    public function getMetrics()
    {
        return $this->get('metrics');
    }
    
    public function getMetricByID($id)
    {
        return $this->getByID('metrics', $id);
    }
}