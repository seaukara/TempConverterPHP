<?php include 'header.php'?>
<?php


error_reporting(E_ALL);//setting error reporting for development debugging
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);


if(isset($_POST['submit'])){//show data

	
	$from = $_POST['Funit'];//current unit of temp of the input value
	$to = $_POST['Tunit'];//unit of temp to convert to

	if($to=='k'){
		$name1 = 'Kelvin';
	}elseif($to=='c'){//from unit is set to celcius
    	$name1 = 'Celcius';
    }elseif($to=='f'){//from unit is set to kelvin
    	$name1 = 'Fahrenheit';
    };

	if(is_numeric($_POST['temp1'])==False){
		$temp_1 = $_POST['temp1'];//numeric input value entered by the user
		$temp_2 = 'Please enter a numeric value.';
		if($from=='f'){
			$name = 'Fahrenheit';
		}elseif($from=='c'){//from unit is set to celcius
	    	$name = 'Celcius';
	    }elseif($from=='k'){//from unit is set to kelvin
	    	$name = 'Kelvin';
	    };
	 //   	if($to=='f'){
		// 	$name1 = 'Farenheit';
		// }elseif($from=='c'){//from unit is set to celcius
	 //    	$name1 = 'celcius';
	 //    }elseif($from=='f'){//from unit is set to kelvin
	 //    	$name1 = 'farenheit';
	 //    };
	}else{
		$temp_1 = (float)$_POST['temp1'];//numeric input value entered by the user
	    if($from=='f'){ //if from unit is set to farenheit
	    	$name = 'Fahrenheit';
	    	if($to=='f'){ //if to unit is set to farenheit
	    		$temp_2 = $temp_1;
	    	}elseif($to=='c'){
	    		$temp_2 = (($temp_1 -32)/1.8);
	    	}elseif($to=='k') {
	    		$temp_2 = (($temp_1-32)/1.8) + 273.15;
	    	};
	    }elseif($from=='c'){//from unit is set to celcius
	    	$name = 'Celcius';
	    	if($to=='c'){//if to unit is set to celcius
	    		$temp_2 = $temp_1;
	    	}elseif($to=='f'){
	    		$temp_2 = ($temp_1*1.8)+32;
	    	}elseif($to=='k'){
	    		$temp_2 = $temp_1+273.15;
	    	};
	    }elseif($from=='k'){//from unit is set to kelvin
	    	$name = 'Kelvin';
	    	if($to=='k'){//if to unit is set to kelvin
	    		$temp_2 = $temp_1;
	    	}elseif($to=='c'){
	    		$temp_2 = $temp_1-273.15;
	    	}elseif($to=='f'){
	    		$temp_2 = (($temp_1-273.15)*1.8)+32;
	    	};
	    };	
	};

    echo '
	<form action="" method="post">
	  <p>
        <label>
            From Unit:<br />
            <select name="Funit" style="width:250px">
                <option value='.$from.'>'.$name.'</option>
                <option value="f">Fahrenheit</option>
                <option value="c">Celcius</option>
                <option value="k">Kelvin</option>
            </select>
        </label>
        <label>
            To Unit:<br />
            <select name="Tunit" style="width:250px">
                <option value='.$to.'>'.$name1.'</option>
                <option value="f">Fahrenheit</option>
                <option value="c">Celcius</option>
                <option value="k">Kelvin</option>
            </select>
        </label>
    </p>
	<p> <label>
		<input type="text" required="True" name="temp1" style="width:250px" value='.$temp_1.'></input>
        </label>
        <label>'.$temp_2.'</label>
        </label>
    </p>

	<p> 

		<input type="submit" name="submit" />
	</p>
	</form>
	';
}else{//show form

	echo '
	<form action="" method="post">
	  <p>
        <label>
            From Unit:<br />
            <select name="Funit" style="width:250px">
                <option value="f">Fahrenheit</option>
                <option value="c">Celcius</option>
                <option value="k">Kelvin</option>
            </select>
        </label>
        <label>
            To Unit:<br />
            <select name="Tunit" style="width:250px">
                <option value="c">Celcius</option>
                <option value="f">Fahrenheit</option>
                <option value="k">Kelvin</option>
            </select>
        </label>
    </p>
	<p> <label>
		<input type="text" required="True" name="temp1" style="width:250px" ></input
        </label>
    </p>


	<p>

		<input type="submit" name="submit" />
	</p>
	</form>
	';
}
?>
<?php include 'footer.php'?>