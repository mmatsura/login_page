<?php
session_start();

$errors = [
    'login_error' => $_SESSION['login_error'] ?? null,
    'register_error' => $_SESSION['register_error'] ?? null
];
$active_form = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error){
    return !empty($error) ? "<p class='error-message'>$error</p>" : "";
}

function isActive($formName, $activeForm){
    return $formName === $activeForm ? "active" : "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css">
    <script>
    !function(t,e){var o,n,p,r;e.__SV||(window.posthog && window.posthog.__loaded)||(window.posthog=e,e._i=[],e.init=function(i,s,a){function g(t,e){var o=e.split(".");2==o.length&&(t=t[o[0]],e=o[1]),t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}}(p=t.createElement("script")).type="text/javascript",p.crossOrigin="anonymous",p.async=!0,p.src=s.api_host.replace(".i.posthog.com","-assets.i.posthog.com")+"/static/array.js",(r=t.getElementsByTagName("script")[0]).parentNode.insertBefore(p,r);var u=e;for(void 0!==a?u=e[a]=[]:a="posthog",u.people=u.people||[],u.toString=function(t){var e="posthog";return"posthog"!==a&&(e+="."+a),t||(e+=" (stub)"),e},u.people.toString=function(){return u.toString(1)+".people (stub)"},o="ci init Pi Ci ft Oi Fi ki capture calculateEventProperties Ui register register_once register_for_session unregister unregister_for_session Bi getFeatureFlag getFeatureFlagPayload getFeatureFlagResult isFeatureEnabled reloadFeatureFlags updateFlags updateEarlyAccessFeatureEnrollment getEarlyAccessFeatures on onFeatureFlags onSurveysLoaded onSessionId getSurveys getActiveMatchingSurveys renderSurvey displaySurvey cancelPendingSurvey canRenderSurvey canRenderSurveyAsync identify setPersonProperties group resetGroups setPersonPropertiesForFlags resetPersonPropertiesForFlags setGroupPropertiesForFlags resetGroupPropertiesForFlags reset get_distinct_id getGroups get_session_id get_session_replay_url alias set_config startSessionRecording stopSessionRecording sessionRecordingStarted captureException startExceptionAutocapture stopExceptionAutocapture loadToolbar get_property getSessionProperty ji Di createPersonProfile setInternalOrTestUser zi Ti Hi opt_in_capturing opt_out_capturing has_opted_in_capturing has_opted_out_capturing get_explicit_consent_status is_capturing clear_opt_in_out_capturing Ai debug bt Ni getPageViewId captureTraceFeedback captureTraceMetric Ei".split(" "),n=0;n<o.length;n++)g(u,o[n]);e._i.push([i,s,a])},e.__SV=1)}(document,window.posthog||[]);
    posthog.init('phc_o9BdmAeH3OFDA1slVsoYMWH3vHg2ORwAVc7te0wEweW', {
        api_host: 'https://eu.i.posthog.com',
        defaults: '2026-01-30',
        person_profiles: 'identified_only', // or 'always' to create profiles for anonymous users as well
    })
</script>
</head>

<body>

    <header>
        <h2 class="logo">Logo</h2>
        <nav class="navigation">
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">Services</a>
                <a href="#">Contact</a>
                <button class="btnLogin-popup">Login</button>
        </nav>
    </header>
    <div id="app-status" style="text-align: center; color: white; padding: 10px; background: rgba(0,0,0,0.5);">
    </div>
    
    <div class="wrapper">
        <div class="form-box login" id="<?php echo isActive('login', $active_form); ?>">
            <h2>Login</h2>
            <?php echo showError($errors['login_error']); ?>
            <form action="php/login_register.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox"> Remember me</label>
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit" name="btnLogin" class="btn" 
                onclick="posthog.capture('user_login_attempt', 
                { priority: 'low', category: 'auth' })">Login</button>
                <div class="login-register">
                    <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
                </div>
            </form>
        </div>

        <div class="form-box register" id="<?php echo isActive('register', $active_form); ?>">
            <h2>Registration</h2>
            <?php echo showError($errors['register_error']); ?>
            <form action="php/login_register.php"  method="post">
                <div class="input-box" name ="name">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <input type="text" name="name" required>
                    <label>Username</label>
                </div>
                <div class="input-box" name="email">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box" name="password">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">I agree to the terms and conditions</label>
                </div>
                <button type="submit" name="btn" class="btn" 
                    onclick="posthog.capture('registration_initiated', { 
                        priority: 'high', 
                        category: 'auth',
                        is_authenticated: false 
                    })">Register</button>
                <div class="login-register">
                    <p>Already have an account? <a href="home.php" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="js/login.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>