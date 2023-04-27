<?php

function name(){
    return "Aplikasi";
}
function rupiah ($angka) {
   $hasil = 'Rp ' . number_format($angka, 2, ",", ".");
   return $hasil;
}
function encoder($b) {
   $data=base64_encode(base64_encode($b));
   return $data;
}
function decoder($b) {
   $data=base64_decode(base64_decode($b));
   return $data;
}
function decimal_format ($angka) {
   $hasil = number_format($angka, 2, ",", ".");
   return $hasil;
}
function page(){
    return "Page-&nbsp;";
}
function url_plug(){
   $data=url('/');
    return $data;
}
function url_plug_local(){
    $data=url('/');
    return $data;
}
function url_link(){
    $data=url()->current();
    $exp=explode(url('/').'/',$data);
    if(count($exp)==1){
      return 'home';
    }else{
      $link=explode('/',$exp[1]);
      return $link[0];
    }
    
}
function tanggal_lengkap($date=null){
   if($date=="" || $date==null){
      return null;
   }else{
      return date('d M, Y H:i:s',strtotime($date));
   }
   
}
function bulan_only($date=null){
   return date('m',strtotime($date));
   
}
function tahun_only($date=null){
   return date('Y',strtotime($date));
   
}
function jam_lengkap($date=null){
   if($date=="" || $date==null){
      return null;
   }else{
      return date('H:i:s',strtotime($date));
   }
   
}
function tanggal_eng($date=null){
   if($date=="" || $date==null){
      return null;
   }else{
      return date('d M Y',strtotime($date));
   }
   
}
function selisih_waktu($waktu){
   $waktu_awal        =strtotime(date('Y-m-d H:i:s'));
   $waktu_akhir    =strtotime($waktu); // bisa juga waktu sekarang now()
   $diff    =$waktu_akhir - $waktu_awal;
   $jam    =floor($diff / (60 * 60));
   $menit    =$diff - $jam * (60 * 60);
   $data= $jam .  ' Hrs ' . floor( $menit / 60 ) . ' min';
   return $data;
}
function selisih_waktu_lewat($waktu){
   $waktu_awal        =strtotime($waktu);
   $waktu_akhir    =strtotime(date('Y-m-d H:i:s')); // bisa juga waktu sekarang now()
   $diff    =$waktu_akhir - $waktu_awal;
   $jam    =floor($diff / (60 * 60));
   $menit    =$diff - $jam * (60 * 60);
   $data= $jam .  ' Hrs ' . floor( $menit / 60 ) . ' min';
   return $data;
}
function selisih_waktu_lewat_duedate($waktu1,$waktu2){
   $waktu_awal        =strtotime($waktu1);
   $waktu_akhir        =strtotime($waktu2);
   $diff    =$waktu_akhir - $waktu_awal;
   $jam    =floor($diff / (60 * 60));
   $menit    =$diff - $jam * (60 * 60);
   $data= $jam .  ' Hrs ' . floor( $menit / 60 ) . ' min';
   return $data;
}
function akses_link(){
    $data=url()->current();
    $exp=explode(url('/').'/',$data);
    if(count($exp)==1){
      $cek=App\Models\Menu::where('link','home')->firstOrfail();
    }else{
      $cek=App\Models\Menu::where('link',$exp[1])->firstOrfail();
    }

    
    $cek=App\Models\Aktivasimenu::where('menu_id',$cek['id'])->where('role_id',Auth::user()['role_id'])->count();
    return $cek;
}

function get_kategori_menu(){
   $data=App\Models\Kategorimenu::get();
   return $data;
}
function get_header_menu(){
   $data=App\Models\Menu::where('kat',3)->get();
   return $data;
}
function app_name(){
    $data='KRAKATAU-IT';
    return $data;
}

function bulan($bulan)
{
   Switch ($bulan){
      case '01' : $bulan="Januari";
         Break;
      case '02' : $bulan="Februari";
         Break;
      case '03' : $bulan="Maret";
         Break;
      case '04' : $bulan="April";
         Break;
      case '05' : $bulan="Mei";
         Break;
      case '06' : $bulan="Juni";
         Break;
      case '07' : $bulan="Juli";
         Break;
      case '08' : $bulan="Agustus";
         Break;
      case '09' : $bulan="September";
         Break;
      case 10 : $bulan="Oktober";
         Break;
      case 11 : $bulan="November";
         Break;
      case 12 : $bulan="Desember";
         Break;
      }
   return $bulan;
}
function bulan_int($bulan)
{
   Switch ($bulan){
      case 1 : $bulan="Januari";
         Break;
      case 2 : $bulan="Februari";
         Break;
      case 3 : $bulan="Maret";
         Break;
      case 4 : $bulan="April";
         Break;
      case 5 : $bulan="Mei";
         Break;
      case 6 : $bulan="Juni";
         Break;
      case 7 : $bulan="Juli";
         Break;
      case 8 : $bulan="Agustus";
         Break;
      case 9 : $bulan="September";
         Break;
      case 10 : $bulan="Oktober";
         Break;
      case 11 : $bulan="November";
         Break;
      case 12 : $bulan="Desember";
         Break;
      }
   return $bulan;
}
function bulan_nama_int($bulan)
{
   Switch ($bulan){
      case 1 : $bulan="Jan";
         Break;
      case 2 : $bulan="Feb";
         Break;
      case 3 : $bulan="Mar";
         Break;
      case 4 : $bulan="Apr";
         Break;
      case 5 : $bulan="May";
         Break;
      case 6 : $bulan="Jun";
         Break;
      case 7 : $bulan="Jul";
         Break;
      case 8 : $bulan="Aug";
         Break;
      case 9 : $bulan="Sep";
         Break;
      case 10 : $bulan="Oct";
         Break;
      case 11 : $bulan="Nov";
         Break;
      case 12 : $bulan="Des";
         Break;
      }
   return $bulan;
}

function parsing_validator($url){
    $content=utf8_encode($url);
    $data = json_decode($content,true);
 
    return $data;
}
function facebook_time_ago($timestamp){  
   $time_ago = strtotime($timestamp);  
   $current_time = time();  
   $time_difference = $current_time - $time_ago;  
   $seconds = $time_difference;  
   $minutes      = round($seconds / 60 );        // value 60 is seconds  
   $hours        = round($seconds / 3600);       //value 3600 is 60 minutes * 60 sec  
   $days         = round($seconds / 86400);      //86400 = 24 * 60 * 60;  
   $weeks        = round($seconds / 604800);     // 7*24*60*60;  
   $months       = round($seconds / 2629440);    //((365+365+365+365+366)/5/12)*24*60*60  
   $years        = round($seconds / 31553280);   //(365+365+365+365+366)/5 * 24 * 60 * 60  
   if($seconds <= 60) {  
    return "Just Now";  
   } else if($minutes <=60) {  
    if($minutes==1){  
      return "one minute ago";  
    }else {  
      return "$minutes minutes ago";  
    }  
   } else if($hours <=24) {  
    if($hours==1) {  
      return "an hour ago";  
    } else {  
      return "$hours hour ago";  
    }  
   }else if($days <= 7) {  
    if($days==1) {  
      return "yesterday";  
    }else {  
      return "$days days ago";  
    }  
   }else if($weeks <= 4.3) {  //4.3 == 52/12
    if($weeks==1){  
      return "a week ago";  
    }else {  
      return "$weeks weeks ago";  
    }  
   } else if($months <=12){  
    if($months==1){  
      return "a month ago";  
    }else{  
      return "$months months ago";  
    }  
   }else {  
    if($years==1){  
      return "one year ago";  
    }else {  
      return "$years years ago";  
    }  
   }  
} 
function tanggal_indo($tgl){
   
   $tg=date('Y-m-d',strtotime($tgl));
   $exp=explode('-',$tg);
   $data=$exp[2].' '.bulan($exp[1]).' '.$exp[0];
   
    return $data;
}
function nama_bulan($tgl){
    $exp=explode('-',$tgl);
    $data=substr(bulan($exp[1]),0,3).' '.$exp[0];
 
    return $data;
}
function bulan_singkatan($bulan){
    
    $data=substr(bulan($bulan),0,3);
 
    return $data;
}
function tanggal_indo_lengkap($tgl=null){
   if($tgl=="" || $tgl==null){
      return null;
   }else{
      $exps=explode(' ',$tgl);
      $exp=explode('-',$exps[0]);
      $data=$exp[2].' '.substr(bulan($exp[1]),0,3).' '.substr($exp[0],2,3).' '.date('H:i:s',strtotime($exps[1]));
   
      return $data;
   }
    
}
function cvr_tanggal_indo($tgl=null){
   if($tgl=="" || $tgl==null){
      return null;
   }else{
      $tanggal=date('y-m-d H:i:s',strtotime($tgl));
      $exps=explode(' ',$tanggal);
      $exp=explode('-',$exps[0]);
      $data=$exp[2].' '.substr(bulan($exp[1]),0,3).' '.$exp[0].','.$exps[1];
   
      return $data;
   }
    
}
function cvr_jam_indo($tgl){
    $exps=explode(' ',$tgl);
    $exp=explode('-',$exps[0]);
    $data=$exps[1].' WIB';
 
    return $data;
}

function bulan_kedepan($tanggal,$lama)
{
   $tgl=explode(' ',$tanggal);
   $hari=$lama;
   $kedepan = date('Y-m-d', strtotime("$hari Month", strtotime($tgl[0])));
   return  $kedepan;
}

function ubah_bulan($id){
   if($id>9){
      $data=$id;
   }else{
      $data='0'.$id;
   }
   return $data;
}

function  humanTiming($time)
	 {

			 $time = time() - $time; // to get the time since that moment
			 $time = ($time<1)? 1 : $time;
			 $tokens = array (
					 31536000 => 'tahun yang lalu',
					 2592000 => 'bulan yang lalu',
					 604800 => 'minggu yang lalu',
					 86400 => 'hari yang lalu',
					 3600 => 'jam yang lalu',
					 60 => 'menit yang lalu',
					 1 => 'detik yang lalu'
			 );

			 foreach ($tokens as $unit => $text) {
					 if ($time < $unit) continue;
					 $numberOfUnits = floor($time / $unit);
					 return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'':'');
			 }

	 }

    function  groupButton($id)
	 {
      if(Auth::user()->role_id == 1){

         return true ;

      } else{

         $identity = $id ;
         // dd($identity);
         $department_id = App\Models\Employee::where('id',Auth::user()->employee_id)->value('department_id');
         $button = App\Models\AButtonsGroups::with('button')->where('department_id',$department_id)->whereHas('button', function($q) use ($identity){ 
            $q->where('identity',$identity);
            })->first();

         if($button){  
            return true; 
         } else {
            return false ;
         }

      }
      	 
      
	 }

    function sendMail($to,$subject,$body){
    //  use PHPMailer\PHPMailer\PHPMailer;
    //  use PHPMailer\PHPMailer\Exception;
            //$passwords = $request->password ;
            $mail = new PHPMailer\PHPMailer\PHPMailer(true);     // Passing `true` enables exceptions 
           // try {
                
                // Email server settings
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'smtp.office365.com';             //  smtp host
                $mail->SMTPAuth = true;
                $mail->Username = 'estatement@info.krakatautirta.co.id';   //  sender username
                $mail->Password = '*krakatautirta2020';       // sender password
                $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
                $mail->Port = 587;                          // port - 587/465
        
                $mail->setFrom('estatement@info.krakatautirta.co.id', 'CIS - PT. Krakatau Tirta Industri');
                $mail->addAddress($to);
               // $mail->addCC($request->emailCc);
               // $mail->addBCC('mixbill.io@gmail.com');
        
                $mail->addReplyTo('estatement@info.krakatautirta.co.id', 'CIS - PT. Krakatau Tirta Industri');
                /*
                if(isset($_FILES['emailAttachments'])) {
                    for ($i=0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
                        $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
                    }
                } */
        
        
                $mail->isHTML(true);                // Set email content format to HTML
        
                $mail->Subject = $subject ;
                $mail->Body    = $body ;
        
                // $mail->AltBody = plain text version of email body;
        
                if( !$mail->send() ) {
                    return response()->json([
                        'success' => false,
                        'message' => $mail->ErrorInfo
                    ], 200);  
                }
                
                else {
                    return response()->json([
                        'success' => true,
                        'message' => 'Email with subject'. $subject .' was sent !'
                    ], 200); 
                }
   }

   function ImageToBase64($path) {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        try {
            $data = file_get_contents($path);
            $type = pathinfo($data, PATHINFO_EXTENSION);

        return 'data:image/' . $type . ';base64,' . base64_encode($data);
            return 'data:image/' . $type . ';base64,' . base64_encode($data);
        } catch (Exception $e) {
            return 'image';
        }
    }
?>