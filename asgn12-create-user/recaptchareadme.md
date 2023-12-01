# Key Details for reCAPTCHA

WEB-250
ID: 6LeGgBYpAAAAAAbaliB8aYuIk-NUS7m7ihmgTzen

https://console.cloud.google.com/security/recaptcha?authuser=0&project=my-project-28400-1700628647110

1. Add monitoring and generate tokens (Frontend)

On an HTML button

The example below uses a button and a named action to provide meaningful results.

1. Load the JavaScript API within the head element of your web page:
<head>
  <script src="https://www.google.com/recaptcha/enterprise.js?render=6LeGgBYpAAAAAAbaliB8aYuIk-NUS7m7ihmgTzen" async defer></script>
  <!-- Your code -->
</head>

2. Define a callback function to handle the token:
<!-- Replace the variables below. -->
<script>
  function onSubmit(token) {
    document.getElementById("demo-form").submit();
  }
</script>

3. Add attributes to your HTML button:
<button class="g-recaptcha"
    data-sitekey="6LeGgBYpAAAAAAbaliB8aYuIk-NUS7m7ihmgTzen"
    data-callback='onSubmit'
    data-action='submit'>
  Submit
</button>

When this button is used to perform an action on your website, the g-recaptcha-response POST parameter contains the response token.

The execute call generates a token. After the token is generated, send the reCAPTCHA Enterprise token to your application backend.

2. Send tokens and get scores (Backend)

Send the generated token to the reCAPTCHA Enterprise REST API or use the reCAPTCHA Enterprise Client Libraries. reCAPTCHA Enterprise processes the token and reports back the token's validity and score.

PHP

<?php
require 'vendor/autoload.php';

// Include Google Cloud dependencies using Composer
use Google\Cloud\RecaptchaEnterprise\V1\RecaptchaEnterpriseServiceClient;
use Google\Cloud\RecaptchaEnterprise\V1\Event;
use Google\Cloud\RecaptchaEnterprise\V1\Assessment;
use Google\Cloud\RecaptchaEnterprise\V1\TokenProperties\InvalidReason;

/**
  * Create an assessment to analyze the risk of a UI action.
  * @param string $recaptchaKey The reCAPTCHA key associated with the site/app
  * @param string $token The generated token obtained from the client.
  * @param string $project Your Google Cloud Project ID.
  * @param string $action Action name corresponding to the token.
  */
function create_assessment(
  string $recaptchaKey,
  string $token,
  string $project
  string $action
): void {
  // Create the reCAPTCHA client.
  // TODO: Cache the client generation code (recommended) or call client.close() before exiting the method.
  $client = new RecaptchaEnterpriseServiceClient();
  $projectName = $client->projectName($project);

  // Set the properties of the event to be tracked.
  $event = (new Event())
    ->setSiteKey($recaptchaKey)
    ->setToken($token);

  // Build the assessment request.
  $assessment = (new Assessment())
    ->setEvent($event);

  try {
    $response = $client->createAssessment(
      $projectName,
      $assessment
    );

    // Check if the token is valid.
    if ($response->getTokenProperties()->getValid() == false) {
      printf('The CreateAssessment() call failed because the token was invalid for the following reason: ');
      printf(InvalidReason::name($response->getTokenProperties()->getInvalidReason()));
      return;
    }

    // Check if the expected action was executed.
    if ($response->getTokenProperties()->getAction() == $action) {
      // Get the risk score and the reason(s).
      // For more information on interpreting the assessment, see:
      // https://cloud.google.com/recaptcha-enterprise/docs/interpret-assessment
      printf('The score for the protection action is:');
      printf($response->getRiskAnalysis()->getScore());
    } else {
      printf('The action attribute in your reCAPTCHA tag does not match the action you are expecting to score');
    }
  } catch (exception $e) {
    printf('CreateAssessment() call failed with the following error: ');
    printf($e);
  }
}

// TODO: Replace the token and reCAPTCHA action variables before running the sample.
create_assessment(
   '6LeGgBYpAAAAAAbaliB8aYuIk-NUS7m7ihmgTzen',
   'YOUR_USER_RESPONSE_TOKEN',
   'my-project-28400-1700628647110',
   'YOUR_RECAPTCHA_ACTION'
);
?>

3. Review

Trigger an event to run reCAPTCHA Enterprise and confirm that your frontend and backend are configured correctly. Note that it can take a few minutes after your site requests a score for activity to start appearing in the Overview tab and Metrics page.

Build on your basic integration:

Interpret assessments : Learn how to interpret scores, understand the level of risk user interactions pose, and take appropriate actions for your site.
https://cloud.google.com/recaptcha-enterprise/docs/interpret-assessment

Annotate assessments : Learn how to tune your model by sending the assessment IDs back to reCAPTCHA Enterprise to confirm results or correct errors.
https://cloud.google.com/recaptcha-enterprise/docs/annotate-assessment
