<?php
class ErrorCheck {
    public $name;
    public $email;
    public $phone;
    public $about;
    public $college;
    public $passw;
    public $industry;
    public $course;
    public $experience;
    public $error = [];

    public function __construct() {
       
        $this->name = isset($_POST['name'])?$this->sanitize($_POST['name']):"=====";
        $this->email =isset($_POST['email'])?$this->sanitize($_POST['email']):"=====";
        $this->phone = isset($_POST['phone'])?$this->sanitize($_POST['phone']):"=====";
        $this->about = isset($_POST['about'])?$this->sanitize($_POST['about']):"=====";
        $this->college = isset($_POST['college'])?$this->sanitize($_POST['college']):"=====";
        $this->industry= isset($_POST['industry'])?$this->sanitize($_POST['industry']):"=====";
        $this->course= isset($_POST['course'])?$this->sanitize($_POST['course']):"=====";
        $this->experience= isset($_POST['experience'])?$this->sanitize($_POST['experience']):"=====";
        $this->passw=isset($_POST['passw'])?$this->sanitize($_POST['passw']):"=====";
         $this->id= isset($_POST['id'])?$this->sanitize($_POST['id']):"";
         $this->Sid= isset($_POST['Sid'])?$this->sanitize($_POST['Sid']):"";
         $this->Rid= isset($_POST['Rid'])?$this->sanitize($_POST['Rid']):"";
       
        $this->profile = isset($_POST['profile'])?$this->sanitize($_POST['profile']):"";
        
        
    
    
	}
	


    public function validation() {
        // Validate name
        if (isset($_POST['name']) and (empty($this->name) || !preg_match('/\w{5,}/',$this->name))) {
            $this->error["name"] = "* name should be alphabetical and non empty";
        }
        if (isset($_POST['college']) and (empty($this->college) || !preg_match('/\w{5,}/',$this->college))) {
            $this->error["college"] = "* college name should be alphabetical and atleast 7 char";
        }
        if (isset($_POST['course']) and (empty($this->course) || !preg_match('/\w{3,}/',$this->course))) {
            $this->error["course"] = "* course should be alphabetical and non empty";
        }

        // Validate email
        if (isset($_POST['email']) and (!filter_var($this->email, FILTER_VALIDATE_EMAIL))) {
            $this->error["email"] = "* Email is not in proper format.";
        }
        if (isset($_POST['profile']) and (empty($this->profile) || !preg_match('/\w{5,}/',$this->profile))) {
            $this->error["profile"] = "* profile should be alphabetical and non empty";
        }
        if (isset($_POST['experience']) && empty($_POST['experience'])) {
    $this->error['experience'] = "* Experience should contain some characters.";
}

        if (isset($_POST['id']) and empty($this->id)) {
            $this->error['id'] = "* ID should be Recruiter ID.";
        }
        // Validate phone number
        if (isset($_POST['phone']) and !preg_match('/^(\d){10}$/', $this->phone)) {
            $this->error['phone'] = '* Phone number should contain numbers only.';
        }
        if (isset($_POST['passw']) and !preg_match('/^([\w\d])+$/',$this->passw)) {
            $this->error['passw'] = '* password should contain alphanumberic only.';
        }

        // Validate about length
        if (isset($_POST['about']) and strlen($this->about) < 3) {
            $this->error['about'] = "* about should contain at least 3 characters.";
        }
        if (isset($_POST['industry']) and empty($this->industry)  ) {
            $this->error['industry'] = "* about should contain at least 2 characters.";
        }

        

        // Return true if there are no errors
        return empty($this->error);
    }

    private function sanitize($input) {
        // Sanitize input data to prevent security vulnerabilities
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }
    public function getErrors() {
        return $this->error;
    }
     public function getDataArray() {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'about' => $this->about,
            'college' => $this->college,
            'industry' => $this->industry,
            'course' => $this->course,
            'experience' => $this->experience,
            'passw' => $this->passw,
            'id'=>$this->id,
            'profile'=>$this->profile,
            'Sid'=>$this->Sid,
            'Rid'=>$this->Rid
        ];
    }
}

?>