<html>
  <head></head>
  <body>
    <!--
    BEFORE RUNNING:
    1. If not already done, enable the Google Sheets API
       and check the quota for your project at
       https://console.developers.google.com/apis/api/sheets
    2. Get access keys for your application. See
       https://developers.google.com/api-client-library/javascript/start/start-js#get-access-keys-for-your-application
    3. For additional information on authentication, see
       https://developers.google.com/sheets/api/quickstart/js#step_2_set_up_the_sample
    -->
    <script type="text/javascript">
    function makeApiCall() {
       alert("call api");
      var params = {
        // The ID of the spreadsheet to update.
        spreadsheetId: '1mV_x0JvE-nP3xRMMtBX8NlQoKjp4qs7oq83t1TfkHx4',  // TODO: Update placeholder value.

        // The A1 notation of a range to search for a logical table of data.
        // Values will be appended after the last row of the table.
        range: 'A1:D5',  // TODO: Update placeholder value.

        // How the input data should be interpreted.
        valueInputOption: 'USER_ENTERED',  // TODO: Update placeholder value.
        // How the input data should be inserted.
        // to update remove thi as comment
        insertDataOption: 'INSERT_ROWS',  // TODO: Update placeholder value.
      };

      var valueRangeBody = {
        "range": "A1:D5",
        "values": [
          ["Wheel", "$20.50", "4", "3/1/2016"],
          // ["Door", "$15", "2", "3/15/2016"],
          // ["Engine", "$100", "1", "30/20/2016"],
          // ["Totals", "=SUM(B2:B4)", "=SUM(C2:C4)", "=MAX(D2:D4)"]
        ],
      };

      var request = gapi.client.sheets.spreadsheets.values.append(params, valueRangeBody);
      request.then(function(response) {
        // TODO: Change code below to process the `response` object:
        console.log(response.result);
      }, function(reason) {
        console.error('error: ' + reason.result.error.message);
      });
    }

    function initClient() {
      var API_KEY = 'AIzaSyAlq08beTezRW1zERKlTMM59qAkPpkYli8';  //
      var CLIENT_ID = '675821833652-g9gqf9h9aaejpjmqvgkasrdtmrf2npjn.apps.googleusercontent.com';

      // TODO: Authorize using one of the following scopes:
      //   'https://www.googleapis.com/auth/drive'
      //   'https://www.googleapis.com/auth/drive.file'
      //   'https://www.googleapis.com/auth/spreadsheets'
      //  jFjeAVszNtWDFUE5AN9HscLT
      var SCOPE = 'https://www.googleapis.com/auth/spreadsheets';
      gapi.client.init({
        'clientId': CLIENT_ID,
        'scope': SCOPE,
        'discoveryDocs': ['https://sheets.googleapis.com/$discovery/rest?version=v4'],
      }).then(function() {
        gapi.auth2.getAuthInstance().isSignedIn.listen(updateSignInStatus);
        updateSignInStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
      });
    }

    function handleClientLoad() {
      gapi.load('client:auth2', initClient);
    }

    function updateSignInStatus(isSignedIn) {
      if (isSignedIn) {
        makeApiCall();
      }
    }

    function handleSignInClick(event) {
      gapi.auth2.getAuthInstance().signIn();
    }

    function handleSignOutClick(event) {
      gapi.auth2.getAuthInstance().signOut();
    }
    </script>
    <script async defer src="https://apis.google.com/js/api.js"
      onload="this.onload=function(){};handleClientLoad()"
      onreadystatechange="if (this.readyState === 'complete') this.onload()">
    </script>
    <button id="signin-button" onclick="handleSignInClick()">Sign in</button>
    <button id="signout-button" onclick="handleSignOutClick()">Sign out</button>
  </body>
</html>
