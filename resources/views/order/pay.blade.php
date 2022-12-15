<html>
	  <head>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
	    <script type="text/javascript"
	      src="https://app.sandbox.midtrans.com/snap/snap.js"
	      data-client-key="{{config('midtrans.client_key')}}"></script>
	    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
	  </head>
	 
	  <body>
	    <button id="pay-button">Pay!</button>
	 
	    <script type="text/javascript">
	      // For example trigger on button clicked, or any time you need
	      var payButton = document.getElementById('pay-button');
	      payButton.addEventListener('click', function () {
	        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
	        snap.pay('{{$snap}}');
	        // customer will be redirected after completing payment pop-up
	      });
	    </script>
	  </body>
	</html>