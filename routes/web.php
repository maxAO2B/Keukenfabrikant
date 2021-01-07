<?php

use Illuminate\Support\Facades\Route;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use Illuminate\Support\Facades\Input;
use App\User;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@index');
route::resource('posts', 'PostsController');
Route::get('/overzicht', 'PagesController@overview');
Route::get('/posts/{id}/example', 'PostsController@example');
Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/home', 'PagesController@index')->name('home');
route::resource('admin/posts', 'HomeController');
route::resource('admin/users', 'userController');
route::get('admin/aanvragen', 'KeukenfabrikantController@adminview');
Route::get('/keukens', 'PagesController@keukens')->name('keukens');
Route::get('/nieuws', 'PagesController@niews')->name('nieuws');
route::resource('admin/posts', 'HomeController');
route::resource('admin/users', 'userController');
Route::post('comments/{post_id}', ['as' => 'comments.stored', 'uses' => 'CommentsController@store']);
route::resource('comments', 'CommentsController');
route::resource('admin/FAQ', 'FAQAdminController');
route::get('/faq', 'FAQController@index');
route::get('/links', 'LinksController@index');
Route::resource('admin/links', 'LinksAdminController');
route::resource('profile', 'profileController');
Route::group(['middleware' => ['auth']], function(){
Route::post('favorite/{post}/add', 'FavoriteController@add')->name('post.favorite');
route::resource('Aposts', 'PostsAdminController');
});

Route::match(['GET', 'POST'], '/contact', function() {
    if(request()->isMethod('post')) {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'mail.keukenfabrikant.nl';              // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'mail@keukenfabrikant.nl';          // SMTP username
            $mail->Password   = 'QwbL7tkN';                      // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;
            // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
            //Recipients
            $mail->setFrom('mail@keukenfabrikant.nl');
            $mail->addAddress('hesselpa@live.nl', 'Hessel Palland');     // Add a recipient
            $mail->addReplyTo($_POST['email']);
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');
        
            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'contact';
            $sanitizedBody = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $mail->Body    = "<h2 align='left'>Bericht van " . $_POST['first'] . "&nbsp" . $_POST['mid'] . "&nbsp" . $_POST['last'] . ".</h2><br/>
                              <b>Email adres:</b>&nbsp<a style='color: black; text-decoration: underline;' href='mailto:" . $_POST['email'] . "'>" . $_POST['email']. "</a><br/>
                              <b>Telefoonnummer:</b>&nbsp<a style='color: black; text-decoration: underline;' href='tel:" . $_POST['phone'] . "'>" . $_POST['phone']. "</a><br/>
                              <br/>
                              <div>" . $sanitizedBody . "</div>";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ]
            ];
        
            $mail->send();
            return view('mail.success');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    return view('mail.contact');
});

Route::get('/keukenfabrikant', 'KeukenfabrikantController@index');
Route::post('/aanvragen', 'KeukenfabrikantController@store');

// Search functie
Route::get('finduser', 'userController@search');
Route::get('searchtitle', 'HomeController@search');
Route::get('findcompany', 'keukenAdminController@search');
Route::post('/keukenfabrikant/afwijzen/{id}', 'KeukenfabrikantController@destroy');
Route::post('/keukenfabrikant/goedkeuren/{id}', 'KeukenfabrikantController@accept');
route::resource('admin/keukens', 'keukenAdminController');
