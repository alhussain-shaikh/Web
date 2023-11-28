<?PHP

class SessionHelper
{

     static function login()
     {
          session_start();
          $_SESSION["loginTime"] = time();
     }

     static function logout(bool $isAjaxRequest)
     {
          if (session_status() === PHP_SESSION_NONE) {
               session_start();
          }
          unset($_SESSION["loginTime"]);
          session_destroy();
          if ($isAjaxRequest) {
               http_response_code(403);
               exit();
          } else {
               header("Location: " . BASE_URL);
          }
     }
     static function checkExpiredSession(bool $isAjaxRequest)
     {
          session_start();
          if (isset($_SESSION["loginTime"])) {
               $sessionTime = time() - $_SESSION["loginTime"];
               if ($sessionTime > 600) {
                    SessionHelper::logout($isAjaxRequest);
               }
          } else {
               SessionHelper::logout($isAjaxRequest);
          }
     }
}
