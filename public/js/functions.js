 synth = window.speechSynthesis;
 pitch = 1
 rate = 0.9

function say(message) {
    var utterThis = new SpeechSynthesisUtterance(message);
    utterThis.pitch = pitch;
    utterThis.rate = rate;
    synth.speak(utterThis);

    return;
}

 window.SpeechRecognition = window.webkitSpeechRecognition || window.SpeechRecognition;
 const recognition = new SpeechRecognition();

 let emailBody = $('#emailBody');
 let emailSubject = $('#emailSubject');
 let emailTo = $('#emailTo');
 let speechToText = '';
 let bodyText = '';

function listenEmailBody() {


    recognition.continuous = true;

     if (bodyText.length) {
         bodyText += ' ';
     }

     recognition.start();

     recognition.onresult = (event) => {

         current = event.resultIndex;

        transcript = event.results[current][0].transcript;

        bodyText += transcript;

         emailBody.val(bodyText);
     }

    recognition.onspeechend = function () {
        say('End');
    }

    recognition.onerror = function () {
        say('Try again');
        emailBody.val('');
        emailBody.focus();
    }

 }

 function listenEmailSubject() {

     recognition.start();

     recognition.onresult = (event) => {

         current = event.resultIndex;

         transcript = event.results[0][0].transcript;

         speechToText = transcript;

         emailSubject.val(speechToText);
     }

     recognition.onspeechend = function () {
         say('End');
         speechToText = '';
     }

     recognition.onerror = function () {
         say('Try again');
         emailSubject.focus();
     }
 }

 function listenEmailTo() {

     recognition.start();

     recognition.onresult = (event) => {

         current = event.resultIndex;

         transcript = event.results[0][0].transcript;

         speechToText = transcript;

         emailTo.val(speechToText);
     }

     recognition.onspeechend = function () {
         say('End');
     }

     recognition.onerror = function (e) {
         console.log(e);
         say('Try again');
         emailTo.focus();
     }
 }

 function listenInput(element) {

    recognition.stop();
     recognition.start();

     recognition.onresult = (event) => {

         current = event.resultIndex;

         transcript = event.results[0][0].transcript;

         speechToText = transcript;

         element.val(speechToText);
     }

     recognition.onspeechend = function () {
         say('End');
     }

     recognition.onerror = function () {
         say('Try again');
         element.focus();
     }
 }
