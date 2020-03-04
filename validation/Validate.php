<?php

class Validate{
    private $_errors = [];
    private $_formMethod = null;

    public function __construct($formMethod){
        $this->_formMethod = $formMethod;
    }

    public function setRules($item, $itemLabel, $rules){
        $formValue = trim($this->_formMethod[$item]);

        // jalankan proses sanitize untuk setiap item (jika di syaratkan)
        if (array_key_exists('sanitize',$rules)) {
            $formValue = Input::runSanitize($formValue,$rules['sanitize']);
        }
        
        foreach ($rules as $rule => $ruleValue) {
            switch ($rule) {
                case 'required':
                    if ($ruleValue === TRUE && empty($formValue)) {
                        $error[$item] = "$itemLabel tidak boleh kosong";
                    }
                    break;
                    
                    case 'min_char':
                        if (strlen($formValue) < $ruleValue) {
                            $error[$item] = "$itemLabel minimal $ruleValue karakter";
                        }
                    break;

                    case 'max_char':
                        if (strlen($formValue) > $ruleValue) {
                            $error[$item] = "$itemLabel maksimal $ruleValue karakter";
                        }
                    break;

                    case 'numeric':
                        if ($formValue < $ruleValue) {
                            $error[$item] = "$itemLabel maksimal $ruleValue";
                        }
                    break;

                    case 'min_value':
                       if ($formValue < $ruleValue) {
                           $error[$item] = "$itemLabel minimal $ruleValue";
                       }
                    break;

                    case 'max_value':
                        if ($formValue > $ruleValue) {
                            $error[$item] = "$itemLabel maksimal $ruleValue";
                        }
                        break;
            }

            // cek jika sudah ada error di item yang sama, Langsng keluar dr loop
            if (!empty($error[$item])) {
                 break;
            }
        }
        // kembalikan nilai yang sudah lewat proses sanitize
        return $formValue;
    }
}
