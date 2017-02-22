<?php

  // is_blank('abcd')
  function is_blank($value='') {
    return !isset($value) || trim($value) == '';
  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  function has_length($value, $options=array()) {
    $length = strlen($value);
    if(isset($options['max']) && ($length > $options['max'])) {
      return false;
    } elseif(isset($options['min']) && ($length < $options['min'])) {
      return false;
    } elseif(isset($options['exact']) && ($length != $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  // has_valid_email_format('test@test.com')
  function has_valid_email_format($value) {
    // Function can be improved later to check for
    // more than just '@'.
    return strpos($value, '@') !== false;
  }
  
  function valid_username($value, $errors=array()) {

    if(is_blank($value)) {
		$errors[] = "Username cannot be blank.";
	}
	else {
		if(!preg_match('/\A[A-Za-z0-9\_]+\Z/', $value)) {
			
			$errors[] = "Username can only contain letters, numbers, and the character _.";
		}
	}
	return $errors;
  }
  
  function valid_phone($value, $errors=array()) {
    if(is_blank($value)) {
		$errors[] = "Phone number cannot be blank.";
	}
	else {
		if(!preg_match('/\A[0-9\(\)\-]+\Z/', $value)) {
			
			$errors[] = "Phone number can only contain numbers and the characters (, ), -.";
		}
	}
	return $errors;
  }
  
  function valid_email($value, $errors=array()) {
    if(is_blank($value)) {
		$errors[] = "Email cannot be blank.";
	}
	else {
		if(!has_valid_email_format($value)) {
			
			$errors[] = "Email does not have the correct format.";
		}
		if(!preg_match('/\A[A-Za-z0-9\@\.\_\-]+\Z/', $value)) {
			
			$errors[] = "Email can only contain letters, numbers, and the characters @, ., _, -";
		}
	}
	return $errors;

  }

  
      // custom 1
  function valid_state_code($value, $errors=array()) {
  
    if(is_blank($value)) {
		$errors[] = "State code cannot be blank.";
	}
	else {
		if(!preg_match('/\A[A-Za-z]+\Z/', $value)) {
			$errors[] = "State code must only contain letters.";
		}
		if(!(strlen($value) == 2)) {
			$errors[] = "State code can only have length 2.";
		}
	}
	return $errors;
  }
  
  // custom 2
  function valid_state_name($value, $errors=array()) {
	
    if(is_blank($value)) {
		$errors[] = "State name cannot be blank.";
	}	
	else {
		if(!has_length($value, ['min' => 2, 'max' => 255])) {
			$errors[] = "State name must be between 2 and 255 characters.";
		}
		if(!preg_match('/\A[A-Za-z]+\Z/', $value)) {
			$errors[] = "State name must only contain letters.";
		}
	}
	return $errors;
  }
  
  // custom 3
  function valid_state_country_id($value, $errors=array()) {

    if(is_blank($value)) {
		$errors[] = "State country id cannot be blank.";
	}
	else {
		if(!preg_match('/\A[0-9]+\Z/', $value)) {
			$errors[] = "State country id can only contain numbers.";
		}
	}
	
	return $errors;
  }
  
  // custom 4
  function valid_territory_name($value, $errors=array()) {
  
	if(is_blank($value)) {
		$errors[] = "Territory name cannot be blank.";
	}
	else {
		if(!has_length($value, ['min' => 2, 'max' => 255])) {
			$errors[] = "Territory name must be between 2 and 255 characters.";
		}
		if(!preg_match('/\A[A-Za-z]+\Z/', $value)) {
			$errors[] = "Territory name must only contain letters.";
		}
	}
	
	return $errors;
  }
  
  // custom 5
  function valid_territory_position($value, $errors=array()) {
  
    if(is_blank($value)) {
		$errors[] = "Territory position cannot be blank.";
	}
	else {
		if(!preg_match('/\A[0-9]+\Z/', $value)) {
			$errors[] = "Territory position can only contain numbers.";
		}
	}
	
	return $errors;	
  }
  
  // custom 6
  function valid_first_name($value, $errors=array()) {
  
    if(is_blank($value)) {
		$errors[] = "First name cannot be blank.";
	}
	else {
		if(!preg_match('/\A[A-Za-z]+\Z/', $value)) {
			$errors[] = "First name must only contain letters.";
		}
	}
	
	return $errors;	
  }
  
    // custom 7
  function valid_last_name($value, $errors=array()) {
  
    if(is_blank($value)) {
		$errors[] = "Last name cannot be blank.";
	}
	else {
		if(!preg_match('/\A[A-Za-z]+\Z/', $value)) {
			$errors[] = "Last name must only contain letters.";
		}
	}
	
	return $errors;	
  }
?>
