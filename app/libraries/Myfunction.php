<?php
class Myfunction
{
	public function _inputGender()
	{
		$arr = array('Laki-Laki', 'Perempuan');
		for ($i = 0; $i < count($arr); $i++) {
			echo "<option value='$arr[$i]'>$arr[$i]</option>";
		}
	}
	public function _editGender($data)
	{
		$arr = array('Laki-Laki', 'Perempuan');
		for ($i = 0; $i < count($arr); $i++) {
			if ($arr[$i] == $data) {
				echo "<option value='$arr[$i]' selected>$arr[$i]</option>";
			} else {
				echo "<option value='$arr[$i]'>$arr[$i]</option>";
			}
		}
	}
	public function _inputRole()
	{
		$arr = array('Guru', 'Pengawas');
		for ($i = 0; $i < count($arr); $i++) {
			echo "<option value='$arr[$i]'>$arr[$i]</option>";
		}
	}
	public function _editRole($data)
	{
		$arr = array('Guru', 'Pengawas');
		for ($i = 0; $i < count($arr); $i++) {
			if ($arr[$i] == $data) {
				echo "<option value='$arr[$i]' selected>$arr[$i]</option>";
			} else {
				echo "<option value='$arr[$i]'>$arr[$i]</option>";
			}
		}
	}
	public function _inputJenisTugas()
	{
		$arr = array('Pokok', 'Tambahan');
		for ($i = 0; $i < count($arr); $i++) {
			echo "<option value='$arr[$i]'>$arr[$i]</option>";
		}
	}
	public function _editJenisTugas($data)
	{
		$arr = array('Pokok', 'Tambahan');
		for ($i = 0; $i < count($arr); $i++) {
			if ($arr[$i] == $data) {
				echo "<option value='$arr[$i]' selected>$arr[$i]</option>";
			} else {
				echo "<option value='$arr[$i]'>$arr[$i]</option>";
			}
		}
	}
	function _inputAgama(){
		$ag = array('Islam','Hindu','Budha','Kristen','Kristen Protestan','Kristen Katolik','Konghucu');
		for($i=0; $i<count($ag); $i++){
			echo "<option value='$ag[$i]'>$ag[$i]</option>";
		}
	}
	function _editAgama($a){
		$ag = array('Islam','Hindu','Budha','Kristen','Kristen Protestan','Kristen Katolik','Konghucu');
		for($i=0; $i<count($ag); $i++){
			if($ag[$i] == $a){
				echo "<option value='$ag[$i]' selected>$ag[$i]</option>";
			}else{
				echo "<option value='$ag[$i]'>$ag[$i]</option>";
			}
		}
	}
	
	function _inputLevel(){
		$ag = array('Kepala Sekolah', 'Guru Senior', 'Guru Mata Pelajaran');
		for($i=0; $i<count($ag); $i++){
			echo "<option value='$ag[$i]'>$ag[$i]</option>";
		}
	}
	function _editLevel($a){
		$ag = array('Kepala Sekolah', 'Guru Senior', 'Guru Mata Pelajaran');
		for($i=0; $i<count($ag); $i++){
			if($ag[$i] == $a){
				echo "<option value='$ag[$i]' selected>$ag[$i]</option>";
			}else{
				echo "<option value='$ag[$i]'>$ag[$i]</option>";
			}
		}
	}
	public function random_color_part() {
    	return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
	}
	public function random_color() {
	    return '#'.$this->random_color_part() . $this->random_color_part() . $this->random_color_part();
	}
	public function _xss($str)
	{
	    return htmlentities($str, ENT_QUOTES, 'UTF-8');
	}
	public function _unlinkFile($vdir_file,$file_name)
	{
		if(file_exists($vdir_file.$file_name) == TRUE){
			unlink($vdir_file.$file_name);
		}
	}
	function getUri()
	{
		$actual_link = $_SERVER['REQUEST_URI'];
		$a = explode('/',$actual_link);
		$b = array_pop($a);
		$c = implode('/',$a);
		$d = $_SERVER['HTTP_HOST'].$c;
		return $d;
	}
	public function _specialChar($content){
		$specialChar = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
		return str_replace($specialChar, '', $content); 
	}	
	public function _sendMail($to,$subject,$messages,$redirect)
	{
		require_once APPPATH . 'third_party/phpmailers/Exception.php';
		require_once APPPATH . 'third_party/phpmailers/OAuth.php';
		require_once APPPATH . 'third_party/phpmailers/PHPMailer.php';
		require_once APPPATH . 'third_party/phpmailers/POP3.php';
		require_once APPPATH . 'third_party/phpmailers/SMTP.php';
		$mail = new PHPMailer\PHPMailer\PHPMailer(true);
		try {
		$mail->SMTPDebug 	= 1;
        $mail->isSMTP();
        $mail->Host 		= 'mail.studiperawat.com';
        $mail->SMTPAuth		= true;
        $mail->Username 	= 'info@studiperawat.com';
        $mail->Password 	= '@2EexZA3j';
        $mail->SMTPSecure 	= 'ssl';
        $mail->Port 		= 465;
        $mail->setFrom('info@studiperawat.com', 'Reklame Gorontalo');
        $mail->addAddress($to);
        $mail->CharSet 		= "UTF-8"; 
        $mail->isHTML(true);
        $mail->Subject 		= $subject;
        $mail->Body    		= $messages;
        $mail->AltBody 		= '';
        $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }  
	}	
	public function _monthAlpha($bulan){
		switch($bulan){
			case"01":	$bulan ='Januari';break;
			case"02":	$bulan ='Februari';break;
			case"03":	$bulan ='Maret';break;
			case"04":	$bulan ='April';break;
			case"05":	$bulan ='Mei';break;
			case"06":	$bulan ='Juni';break;
			case"07":	$bulan ='Juli';break;
			case"08":	$bulan ='Agustus';break;
			case"09":	$bulan ='September';break;
			case"10":	$bulan ='Oktober';break;
			case"11":	$bulan ='November';break;
			case"12":	$bulan ='Desember';break;
		}	
		return $bulan;
	}
	
	function getDay($time=""){
		$date = date('l',strtotime($time));
		switch($date){
			case "Sunday"	: $hari = "Minggu"; break;
 			case "Monday"	: $hari = "Senin";	break;
 			case "Tuesday"	: $hari = "Selasa";	break;
			case "Wednesday": $hari = "Rabu";	break;
			case "Thursday"	: $hari = "Kamis";	break;
			case "Friday"	: $hari = "Jumat";	break;
			case "Saturday"	: $hari = "Sabtu";	break;
		}
		return $hari;
	}
	public function cutStr($text,$num_char=""){
		if(strlen($text) > $num_char){
			if ($text{$num_char - 1} != ' ') {
				$num_char = strpos($text, ' ', $num_char);
			} 
			$result = substr($text, 0, $num_char) . '...';
		}else{
			$result = $text;
		}
		return $result;
	}
	public function cutStr1($text, $maxchar=500, $end='...') {
        if (strlen($text) > $maxchar || $text == '') {
            $words = preg_split('/\s/', $text);      
            $output = '';
            $i      = 0;
            while (1) {
                $length = strlen($output)+strlen($words[$i]);
                if ($length > $maxchar) {
                    break;
                } 
                else {
                    $output .= " " . $words[$i];
                    ++$i;
                }
            }
            $output .= $end;
        } 
        else {
            $output = $text;
        }
        return $output;
	}
	
	public function _uploadAvatar($name,$tmp_name,$photo_old)
	{
		$nama_file		= explode(".",$name);
		$lokasi_file 	= $tmp_name;
		$random 		= rand(1,999999). '.' .end($nama_file);
		$avatar			= ("AVATAR"."-".$random);
		$vdir_upload 	= './lib/images/user/';
		$info_image		= getimagesize($tmp_name);
		if(file_exists($vdir_upload.$photo_old) == TRUE){
			unlink($vdir_upload.$photo_old);
		}
		switch ($info_image['mime']) {
            case 'image/jpeg':
            	$image_create_func 	= 'imagecreatefromjpeg';
            	$image_save_func 	= 'imagejpeg';
            break;
            case 'image/png':
            	$image_create_func 	= 'imagecreatefrompng';
           		$image_save_func 	= 'imagepng';
            break;
            case 'image/gif':
            	$image_create_func 	= 'imagecreatefromgif';
            	$image_save_func 	= 'imagegif';
            break;
    	}
		$vfile_upload 	= $vdir_upload . $avatar;
		move_uploaded_file($tmp_name, $vfile_upload);
		$im_src 		= $image_create_func($vfile_upload);
		$src_width 		= imageSX($im_src);
		$src_height 	= imageSY($im_src);
		$dst_width 		= 300;
		$dst_height 	= 300;
		$im 			= imagecreatetruecolor($dst_width,$dst_height);
		imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
		$image_save_func($im, $vdir_upload.$gambar);
		imagedestroy($im_src);
		imagedestroy($im);
		return $avatar;
	}
	public function _slugify($text){ 

        //YOU CAN CHANGE THIS FUNCTION TO FORMAT THE TITLE VALUE HOWEVER
        //YOU WANT IT TO APPEAR IF THIS DOESN'T WORK FOR YOU. ALSO, THIS FUNCTION
        //WOULD MAKE MORE SENSE IN A HELPER FILE.

        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

        // trim
        $text = trim($text, '-');

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // lowercase
        $text = strtolower($text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text))
        {
          return 'n-a';
        }
        return $text;
	}
	public function _getDay($date)
	{
		$namahari 	 = date('l', strtotime($date));
		$daftar_hari = ['Sunday' 	=> 'Minggu',
						'Monday' 	=> 'Senin',
						'Tuesday' 	=> 'Selasa',
						'Wednesday' => 'Rabu',
						'Thursday' 	=> 'Kamis',
						'Friday' 	=> 'Jumat',
						'Saturday' 	=> 'Sabtu'];
		return $daftar_hari[$namahari];
	}
	public function _getMonth($month)
	{
		$bulan = array(
                '01' => 'Januari',
                '02' => 'Februari',
                '03' => 'Maret',
                '04' => 'April',
                '05' => 'Mei',
                '06' => 'Juni',
                '07' => 'Juli',
                '08' => 'Agustus',
                '09' => 'September',
                '10' => 'Oktober',
                '11' => 'November',
                '12' => 'Desember',
        );
		return $bulan[$month];
	}
	public function _encdec($action, $string) {
	    $output 		= false;
	    $encrypt_method = "AES-256-CBC";
	    $secret_key 	= 'Rh3zKyr3r308';
	    $secret_iv 		= '@0892rH3zKy';
	    $key 			= hash('sha256', $secret_key);
	    $iv 			= substr(hash('sha256', $secret_iv), 0, 16);
	    if($action == 'enc') {
	        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	        $output = base64_encode($output);
	    }elseif($action == 'dec') {
	        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	    }
	    return $output;
	}
	
	public function base64Encrypt($encrypt){
		$val = trim(base64_encode($encrypt),'=');
		return $val;
	}
	public function base64Decrypt($decrypt){
		$val = trim(base64_decode($decrypt),' ');
		return $val;
	}
	function hapus_underscore($h) {
		$d ='-';
		$h = str_replace($d,' ',$h);
		
		return ucwords($h);
	}
	function hapus_underscore_min($h){
		$d = '-';
		$h = str_replace($d,' ',$h);
		$t = ucwords($h);
		$k = ' ';
		$x = str_replace($k,'-',$t);
		return $x;
	}
	function hapus_underscore_min1($h){
		$d = '-';
		$h = str_replace($d,' ',$h);
		$t = ucwords($h);
		$k = ' ';
		$x = str_replace($k,' ',$t);
		return $x;
	}
	function rupiah($angka){
	  $rupiah="<small>Rp.</small>".number_format($angka,0,',','.').",-";
	  return $rupiah;
	}
	function rupiah1($angka){
	  $rupiah=number_format($angka,0,',','.').",-";
	  return $rupiah;
	}
	function rupiah2($angka){
	  $rupiah="Rp. ".number_format($angka,0,',','.').",-";
	  return $rupiah;
	}
	function notification($alert,$message){
		switch($alert){
			case 'success'	: $alert = "<div class='alert alert-success' ><strong>Sukses!</strong> $message</div>"; break;
 			case 'danger'	: $alert = "<div class='alert alert-danger'><strong>Gagal!</strong> $message</div>";	break;
 			case 'info'		: $alert = "<div class='alert alert-info'><strong>Informasi!</strong> $message</div>";		break;
			case 'warning'	: $alert = "<div class='alert alert-warning'><strong>Perhatian!</strong> $message</div>";	break;
		}
		return $alert;
	}
	//Fungsi Tanggal
	function tanggal($tgl) {
			$tanggal = substr($tgl,8,2);
			return $tanggal;
	}
	function bulan($bln){
			$angka = (substr($bln,5,2)) -1;
			$bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
			return $bulan[$angka];
	}
	function bulan1($bln){
			$bulan = substr($bln,5,2);
			return $bulan;
	}
	function tahun($thn){
		 	$tahun = substr($thn,0,4);
		 	return $tahun;
	}
	function format_tgl1($format_tanggal){ //Format Tanggal Indonesia: DD MMMMMM YYYY
		$format = $this -> tanggal($format_tanggal)." ".$this -> bulan($format_tanggal)." ".$this -> tahun($format_tanggal);
		return $format;
	}
	function format_tgl2($format_tanggal){ //Format Tanggal Indonesia: DD-MMMMMM-YYYY
		$format = $this -> tanggal($format_tanggal)."-".$this -> bulan($format_tanggal)."-".$this -> tahun($format_tanggal);
		return $format;
	}
	function format_tgl3($format_tanggal){ //Format Tanggal Indonesia: DD-MM-YYYY
		$format = $this -> tanggal($format_tanggal)."-".$this -> bulan1($format_tanggal)."-".$this -> tahun($format_tanggal);
		return $format;
	}
	function format_tgl4($format_tanggal){ //Format Tanggal Indonesia: DD/MM/YYYY
		$format = $this -> tanggal($format_tanggal)."/".$this -> bulan1($format_tanggal)."/".$this -> tahun($format_tanggal);
		return $format;
	}
	function format_tgl5($format_tanggal){ //Format Tanggal: MM DD YYYY
		$format = $this -> bulan($format_tanggal)." ".$this -> tanggal($format_tanggal).", ".$this -> tahun($format_tanggal);
		return $format;
	}
	function format_tgl6($format_tanggal){ //Format Tanggal: MM/DD/YYYY
		$format = $this -> bulan1($format_tanggal)."/".$this -> tanggal($format_tanggal)."/".$this -> tahun($format_tanggal);
		return $format;
	}
}