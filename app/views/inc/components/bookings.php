<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   List of Bookings
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e9f2fa;
        }
        .container {
            width: 90%;
            margin: 20px auto;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 24px;
            font-weight: 700;
            margin: 0;
            color: #007bff;
        }
        .header p {
            font-size: 14px;
            color: #6c757d;
            margin: 0;
        }
        .filter {
            margin-bottom: 20px;
        }
        .filter select {
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #d1e7ff;
            font-weight: 500;
            font-size: 14px;
            color: #007bff;
        }
        td {
            font-size: 14px;
            color: #495057;
        }
        tr {
            border-bottom: 1px solid #dee2e6;
        }
        tr:last-child {
            border-bottom: none;
        }
        .booking-info {
            display: flex;
            align-items: center;
        }
        .booking-info img {
            border-radius: 50%;
            margin-right: 10px;
        }
        .booking-info div {
            display: flex;
            flex-direction: column;
        }
        .booking-info div span {
            font-size: 14px;
        }
        .booking-info div span:first-child {
            font-weight: 500;
        }
        .status {
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 500;
        }
        .status.full-paid {
            background-color: #d1e7ff;
            color: #007bff;
        }
        .status.advanced-only {
            background-color: #fff3cd;
            color: #856404;
        }
        .action {
            text-align: center;
        }
        .action button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 500;
        }
        .action .view-btn {
            background-color: #007bff;
            color: white;
        }
        .action .refund-btn {
            background-color: #dc3545;
            color: white;
        }
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
            }
            .header h1 {
                margin-bottom: 10px;
            }
            table, th, td {
                display: block;
                width: 100%;
            }
            th, td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }
            th::before, td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 15px;
                font-weight: 500;
                text-align: left;
            }
            th {
                background-color: transparent;
                color: #007bff;
            }
            tr {
                border-bottom: 1px solid #dee2e6;
                margin-bottom: 10px;
            }
        }
  </style>
 </head>
 <body>
  <div class="container">
   <div class="header">
    <div>
     <h1>
      List of Bookings
     </h1>
     <p>
      345 available bookings
     </p>
    </div>
   </div>
   <div class="filter">
    <select>
     <option value="all">
      All Services
     </option>
     <option value="accommodation">
      Accommodation Bookings
     </option>
     <option value="guider">
      Guider Bookings
     </option>
     <option value="equipment">
      Equipment Bookings
     </option>
     <option value="vehicle">
      Vehicle Bookings
     </option>
    </select>
   </div>
   <table>
    <thead>
     <tr>
      <th>
       Name
      </th>
      <th>
       ID
      </th>
      <th>
       Email
      </th>
      <th>
       Phone number
      </th>
      <th>
       Date added
      </th>
      <th>
       STATUS
      </th>
      <th>
       Action
      </th>
     </tr>
    </thead>
    <tbody>
     <tr>
      <td data-label="Name">
       <div class="booking-info">
        <img alt="Customer's profile picture" height="40" src="https://storage.googleapis.com/a1aa/image/sbYCVZ2ikm5dGdHt2ZTmbVRfgh2Z1PXvUxhdLd6tEB8SvI7JA.jpg" width="40"/>
        <div>
         <span>
          Nimal Perera
         </span>
         <span>
          Accommodation Booking
         </span>
        </div>
       </div>
      </td>
      <td data-label="ID">
       87364523
      </td>
      <td data-label="Email">
       nimalp@mail.com
      </td>
      <td data-label="Phone number">
       +94 71 555 0123
      </td>
      <td data-label="Date added">
       21/12/2022 10:40 PM
      </td>
      <td data-label="STATUS">
       <span class="status full-paid">
        Full Paid
       </span>
      </td>
      <td data-label="Action">
       <div class="action">
        <button class="view-btn" onclick="viewDetails('87364523')">
         View
        </button>
        <button class="refund-btn" onclick="refundBooking('87364523')">
         Refund
        </button>
       </div>
      </td>
     </tr>
     <tr>
      <td data-label="Name">
       <div class="booking-info">
        <img alt="Customer's profile picture" height="40" src="https://storage.googleapis.com/a1aa/image/sbYCVZ2ikm5dGdHt2ZTmbVRfgh2Z1PXvUxhdLd6tEB8SvI7JA.jpg" width="40"/>
        <div>
         <span>
          Sunil Fernando
         </span>
         <span>
          Guider Booking
         </span>
        </div>
       </div>
      </td>
      <td data-label="ID">
       93874653
      </td>
      <td data-label="Email">
       sunilf@mail.com
      </td>
      <td data-label="Phone number">
       +94 77 555 0114
      </td>
      <td data-label="Date added">
       22/12/2022 05:20 PM
      </td>
      <td data-label="STATUS">
       <span class="status advanced-only">
        Advanced Only
       </span>
      </td>
      <td data-label="Action">
       <div class="action">
        <button class="view-btn" onclick="viewDetails('93874653')">
         View
        </button>
        <button class="refund-btn" onclick="refundBooking('93874653')">
         Refund
        </button>
       </div>
      </td>
     </tr>
     <tr>
      <td data-label="Name">
       <div class="booking-info">
        <img alt="Customer's profile picture" height="40" src="https://storage.googleapis.com/a1aa/image/sbYCVZ2ikm5dGdHt2ZTmbVRfgh2Z1PXvUxhdLd6tEB8SvI7JA.jpg" width="40"/>
        <div>
         <span>
          Kamal Silva
         </span>
         <span>
          Equipment Booking
         </span>
        </div>
       </div>
      </td>
      <td data-label="ID">
       23847569
      </td>
      <td data-label="Email">
       kamals@mail.com
      </td>
      <td data-label="Phone number">
       +94 75 555 0115
      </td>
      <td data-label="Date added">
       23/12/2022 12:40 PM
      </td>
      <td data-label="STATUS">
       <span class="status full-paid">
        Full Paid
       </span>
      </td>
      <td data-label="Action">
       <div class="action">
        <button class="view-btn" onclick="viewDetails('23847569')">
         View
        </button>
        <button class="refund-btn" onclick="refundBooking('23847569')">
         Refund
        </button>
       </div>
      </td>
     </tr>
     <tr>
      <td data-label="Name">
       <div class="booking-info">
        <img alt="Customer's profile picture" height="40" src="https://storage.googleapis.com/a1aa/image/sbYCVZ2ikm5dGdHt2ZTmbVRfgh2Z1PXvUxhdLd6tEB8SvI7JA.jpg" width="40"/>
        <div>
         <span>
          Ruwan Jayasuriya
         </span>
         <span>
          Vehicle Booking
         </span>
        </div>
       </div>
      </td>
      <td data-label="ID">
       39485632
      </td>
      <td data-label="Email">
       ruwanj@mail.com
      </td>
      <td data-label="Phone number">
       +94 76 555 0109
      </td>
      <td data-label="Date added">
       24/12/2022 03:00 PM
      </td>
      <td data-label="STATUS">
       <span class="status full-paid">
        Full Paid
       </span>
      </td>
      <td data-label="Action">
       <div class="action">
        <button class="view-btn" onclick="viewDetails('39485632')">
         View
        </button>
        <button class="refund-btn" onclick="refundBooking('39485632')">
         Refund
        </button>
       </div>
      </td>
     </tr>
     <tr>
      <td data-label="Name">
       <div class="booking-info">
        <img alt="Customer's profile picture" height="40" src="https://storage.googleapis.com/a1aa/image/sbYCVZ2ikm5dGdHt2ZTmbVRfgh2Z1PXvUxhdLd6tEB8SvI7JA.jpg" width="40"/>
        <div>
         <span>
          Nimal Perera
         </span>
         <span>
          Accommodation Booking
         </span>
        </div>
       </div>
      </td>
      <td data-label="ID">
       87364523
      </td>
      <td data-label="Email">
       nimalp@mail.com
      </td>
      <td data-label="Phone number">
       +94 71 555 0123
      </td>
      <td data-label="Date added">
       21/12/2022 10:40 PM
      </td>
      <td data-label="STATUS">
       <span class="status full-paid">
        Full Paid
       </span>
      </td>
      <td data-label="Action">
       <div class="action">
        <button class="view-btn" onclick="viewDetails('87364523')">
         View
        </button>
        <button class="refund-btn" onclick="refundBooking('87364523')">
         Refund
        </button>
       </div>
      </td>
     </tr>
     <tr>
      <td data-label="Name">
       <div class="booking-info">
        <img alt="Customer's profile picture" height="40" src="https://storage.googleapis.com/a1aa/image/sbYCVZ2ikm5dGdHt2ZTmbVRfgh2Z1PXvUxhdLd6tEB8SvI7JA.jpg" width="40"/>
        <div>
         <span>
          Sunil Fernando
         </span>
         <span>
          Guider Booking
         </span>
        </div>
       </div>
      </td>
      <td data-label="ID">
       93874653
      </td>
      <td data-label="Email">
       sunilf@mail.com
      </td>
      <td data-label="Phone number">
       +94 77 555 0114
      </td>
      <td data-label="Date added">
       22/12/2022 05:20 PM
      </td>
      <td data-label="STATUS">
       <span class="status advanced-only">
        Advanced Only
       </span>
      </td>
      <td data-label="Action">
       <div class="action">
        <button class="view-btn" onclick="viewDetails('93874653')">
         View
        </button>
        <button class="refund-btn" onclick="refundBooking('93874653')">
         Refund
        </button>
       </div>
      </td>
     </tr>
     <tr>
      <td data-label="Name">
       <div class="booking-info">
        <img alt="Customer's profile picture" height="40" src="https://storage.googleapis.com/a1aa/image/sbYCVZ2ikm5dGdHt2ZTmbVRfgh2Z1PXvUxhdLd6tEB8SvI7JA.jpg" width="40"/>
        <div>
         <span>
          Kamal Silva
         </span>
         <span>
          Equipment Booking
         </span>
        </div>
       </div>
      </td>
      <td data-label="ID">
       23847569
      </td>
      <td data-label="Email">
       kamals@mail.com
      </td>
      <td data-label="Phone number">
       +94 75 555 0115
      </td>
      <td data-label="Date added">
       23/12/2022 12:40 PM
      </td>
      <td data-label="STATUS">
       <span class="status full-paid">
        Full Paid
       </span>
      </td>
      <td data-label="Action">
       <div class="action">
        <button class="view-btn" onclick="viewDetails('23847569')">
         View
        </button>
        <button class="refund-btn" onclick="refundBooking('23847569')">
         Refund
        </button>
       </div>
      </td>
     </tr>
     <tr>
      <td data-label="Name">
       <div class="booking-info">
        <img alt="Customer's profile picture" height="40" src="https://storage.googleapis.com/a1aa/image/sbYCVZ2ikm5dGdHt2ZTmbVRfgh2Z1PXvUxhdLd6tEB8SvI7JA.jpg" width="40"/>
        <div>
         <span>
          Ruwan Jayasuriya
         </span>
         <span>
          Vehicle Booking
         </span>
        </div>
       </div>
      </td>
      <td data-label="ID">
       39485632
      </td>
      <td data-label="Email">
       ruwanj@mail.com
      </td>
      <td data-label="Phone number">
       +94 76 555 0109
      </td>
      <td data-label="Date added">
       24/12/2022 03:00 PM
      </td>
      <td data-label="STATUS">
       <span class="status full-paid">
        Full Paid
       </span>
      </td>
      <td data-label="Action">
       <div class="action">
        <button class="view-btn" onclick="viewDetails('39485632')">
         View
        </button>
        <button class="refund-btn" onclick="refundBooking('39485632')">
         Refund
        </button>
       </div>
      </td>
     </tr>
    </tbody>
   </table>
  </div>
  <script>
   function viewDetails(id) {
            alert('Viewing details for booking ID: ' + id);
        }

        function refundBooking(id) {
            alert('Processing refund for booking ID: ' + id);
        }
  </script>
 </body>
</html>
