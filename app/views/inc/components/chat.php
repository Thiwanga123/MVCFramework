<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Admin Chat Panel
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
  <style>
   *body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            display:flex;
            background-color: #f5f5f5;
        }


        .container1 {
            width: 100%;
            padding: 5px;
            height: 100vh;
            display: flex;
            flex-direction: row;
        }
      
        .sidebar1 {
            width: 30%;
            background-color: #fff;
            border-right: 1px solid #e0e0e0;
            display: flex;
            padding: 10px;
            flex-direction: column;
        }
        .sidebar1-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #e0e0e0;
        }
        .sidebar1-header h2 {
            font-size: 18px;
            font-weight: 600;
            margin: 0;
        }
        .sidebar1-header .badge {
            background-color: #e0e0e0;
            border-radius: 12px;
            padding: 2px 8px;
            font-size: 12px;
            font-weight: 500;
        }
        .sidebar1-header .add-btn {
            background-color: #5865f2;
            color: #fff;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            cursor: pointer;
        }
        .search-bar {
            padding: 10px 20px;
            border-bottom: 1px solid #e0e0e0;
        }
        .search-bar input {
            width: 100%;
            padding: 10px;
            border: 1px solid #e0e0e0;
            border-radius: 20px;
            font-size: 14px;
        }
        .contact-list {
            flex: 1;
            overflow-y: auto;
        }
        .contact-item {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            cursor: pointer;
            border-bottom: 1px solid #e0e0e0;
        }
        .contact-item:hover {
            background-color: #f0f0f0;
        }
        .contact-item.active {
            background-color: #e0e0ff;
        }
        .contact-item img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 15px;
        }
        .contact-item .contact-info {
            flex: 1;
        }
        .contact-item .contact-info h4 {
            margin: 0;
            font-size: 16px;
            font-weight: 500;
        }
        .contact-item .contact-info p {
            margin: 0;
            font-size: 14px;
            color: #888;
        }
        .contact-item .contact-time {
            font-size: 12px;
            color: #888;
        }
        .contact-item .contact-tags {
            display: flex;
            gap: 5px;
            margin-top: 5px;
        }
        .contact-item .contact-tags .tag {
            background-color: #e0e0e0;
            border-radius: 12px;
            padding: 2px 8px;
            font-size: 12px;
            font-weight: 500;
        }
        .contact-item .contact-tags .tag.bug {
            background-color: #ff6b6b;
            color: #fff;
        }
        .contact-item .contact-tags .tag.hacktoberfest {
            background-color: #ff9f43;
            color: #fff;
        }
        .contact-item .contact-tags .tag.question {
            background-color: #ffcc00;
            color: #fff;
        }
        .contact-item .contact-tags .tag.help-wanted {
            background-color: #00c851;
            color: #fff;
        }
        .contact-item .contact-tags .tag.some-content {
            background-color: #33b5e5;
            color: #fff;
        }
        .contact-item .contact-tags .tag.request {
            background-color: #2bbbad;
            color: #fff;
        }
        .contact-item .contact-tags .tag.follow-up {
            background-color: #aa66cc;
            color: #fff;
        }
        .chat-area {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: #fff;
        }
        .chat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #e0e0e0;
        }
        .chat-header .user-info {
            display: flex;
            align-items: center;
        }
        .chat-header .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 15px;
        }
        .chat-header .user-info h3 {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
        }
        .chat-header .user-info .status {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: #888;
        }
        .chat-header .user-info .status .online {
            width: 8px;
            height: 8px;
            background-color: #00c851;
            border-radius: 50%;
            margin-right: 5px;
        }
        .chat-header .call-btn {
            background-color: #e0e0ff;
            color: #5865f2;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
        }
        .chat-messages {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }
        .message {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }
        .message img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 15px;
        }
        .message .message-content {
            max-width: 40%;
            gap:10px;
        }
        .message .message-content p {
            background-color: #f0f0f0;
            border-radius: 20px;
            padding: 10px 15px;
            margin: 0;
            font-size: 14px;
        }
        .message.sent .message-content p {
            background-color: #5865f2;
            color: #fff;
            text-align: right;
        }
        .message.sent {
            flex-direction: row-reverse;
        }
        .message.sent img {
            margin-left: 15px;
            margin-right: 0;
        }
        .chat-input {
            display: flex;
            align-items: center;
            padding: 20px;
            border-top: 1px solid #e0e0e0;
        }
        .chat-input input {
            flex: 1;
            padding: 10px 15px;
            border: 1px solid #e0e0e0;
            border-radius: 20px;
            font-size: 14px;
        }
        .chat-input .send-btn {
            background-color: #5865f2;
            color: #fff;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            margin-left: 10px;
            cursor: pointer;
        }
  </style>
 </head>
 
  <div class="container1">
   <div class="sidebar1">
    <div class="sidebar-header1">
     <h2>
      Messages
      <span class="badge">
       12
      </span>
     </h2>
     <div class="add-btn">
    
     </div>
    </div>
    <div class="search-bar">
     <input placeholder="Search messages" type="text"/>
    </div>
    <div class="contact-list">
     <div class="contact-item">
      <img alt="Profile picture of Elmer Laverty" height="40" src="https://storage.googleapis.com/a1aa/image/n1s5U6HxpD6HANrJvx25RdQE6IRNR4T18fH0S5s7oxIzKD7JA.jpg" width="40"/>
      <div class="contact-info">
       <h4>
        Nuwan Chamara
       </h4>
       <p>
        Ok Thank you.
       </p>
      </div>
      <div class="contact-time">
       12m
      </div>
     </div>
     <div class="contact-item active">
      <img alt="Profile picture of Florencio Dorrance" height="40" src="https://storage.googleapis.com/a1aa/image/y5CWrxIHcB6yF5v2Mk2QmuU5iLHsBaAfxrpM2fJQ7pfOrMsnA.jpg" width="40"/>
      <div class="contact-info">
       <h4>
        Thushan Gimhana
       </h4>
       <p>
        Can I know?
       </p>
       
      </div>
      <div class="contact-time">
       24m
      </div>
     </div>
     <div class="contact-item">
      <img alt="Profile picture of Lavern Laboy" height="40" src="https://storage.googleapis.com/a1aa/image/xFwwiRy6iQooK9S6NpAyWMSvS5uC8jOXAQBs3XEc59Mblh9E.jpg" width="40"/>
      <div class="contact-info">
       <h4>
       Arun Rajapaksha(Accommmodation)
       </h4>
       <p>
        I'll be there in 2 mins ⏰
       </p>
       <div class="contact-tags">
       </div>
      </div>
      <div class="contact-time">
       1h
      </div>
     </div>
     <div class="contact-item">
      <img alt="Profile picture of Titus Kitamura" height="40" src="https://storage.googleapis.com/a1aa/image/Gvv36bXavoIPHt3VdOTxecbXBRi1CyHcNO8bdynnizm1KD7JA.jpg" width="40"/>
      <div class="contact-info">
       <h4>
        Nimal Susantha
       </h4>
       <p>
        Ok I'll Update (Vehicle supplier)
       </p>
      </div>
      <div class="contact-time">
       5h
      </div>
     </div>
     <div class="contact-item">
      <img alt="Profile picture of Geoffrey Mott" height="40" src="https://storage.googleapis.com/a1aa/image/K0Wu9p9K5w4cLBtJgYCYImEGPL7zzBGbFLUuYyc5Q1OZlh9E.jpg" width="40"/>
      <div class="contact-info">
       <h4>
       Dinusha Perera
       </h4>
       <p>
       Yes.I'll check and let u know.
       </p>
       <div class="contact-tags">
        <span class="tag request">
         Request
        </span>
       </div>
      </div>
      <div class="contact-time">
       2d
      </div>
     </div>
     <div class="contact-item">
      <img alt="Profile picture of Alfonzo Schuessler" height="40" src="https://storage.googleapis.com/a1aa/image/xxE65LXwf8VfO0DRsmzy6eXDeWVXC0fnRgTLrjfYiYBgalh9E.jpg" width="40"/>
      <div class="contact-info">
       <h4>
       Deshan Rashmika
       </h4>
       <p>
        perfect!
       </p>
       <div class="contact-tags">
        <span class="tag follow-up">
         Follow up
        </span>
       </div>
      </div>
      <div class="contact-time">
       1m
      </div>
     </div>
    </div>
   </div>
   <div class="chat-area">
    <div class="chat-header">
     <div class="user-info">
      <img alt="Profile picture of Florencio Dorrance" height="40" src="https://storage.googleapis.com/a1aa/image/y5CWrxIHcB6yF5v2Mk2QmuU5iLHsBaAfxrpM2fJQ7pfOrMsnA.jpg" width="40"/>
      <div>
       <h3>
        Thushan Gimhana
       </h3>
       <div class="status">
        <div class="online">
        </div>
        Online
       </div>
      </div>
     </div>
    </div>
    <div class="chat-messages">
     <div class="message">
      <img alt="Profile picture of Florencio Dorrance" height="40" src="https://storage.googleapis.com/a1aa/image/y5CWrxIHcB6yF5v2Mk2QmuU5iLHsBaAfxrpM2fJQ7pfOrMsnA.jpg" width="40"/>
      <div class="message-content">
       <p>
        Can I know there any issue when making payments
       </p>
       <p>
       Bcz my payment was not successful
       </p>
      </div>
     </div>
     <div class="message sent">
      <img alt="Profile picture of the user" height="40" src="https://storage.googleapis.com/a1aa/image/Zr5rOexoKbVxaikMe6mazLTPochErqR9oLwmTUybxTzoVG2TA.jpg" width="40"/>
      <div class="message-content">
       <p>
       Dear Sir Sorry for the inconvenience
       </p>
       <p>
        I'll check and let u know
       </p>
      </div>
     </div>
     <div class="message">
      <img alt="Profile picture of Florencio Dorrance" height="40" src="https://storage.googleapis.com/a1aa/image/y5CWrxIHcB6yF5v2Mk2QmuU5iLHsBaAfxrpM2fJQ7pfOrMsnA.jpg" width="40"/>
      <div class="message-content">
       <p>
        Ok I'll wait
       </p>
       <p>
        I think the time is 10.10am today.
       </p>
      </div>
     </div>
     <div class="message sent">
      <img alt="Profile picture of the user" height="40" src="https://storage.googleapis.com/a1aa/image/Zr5rOexoKbVxaikMe6mazLTPochErqR9oLwmTUybxTzoVG2TA.jpg" width="40"/>
      <div class="message-content">
       <p>
       Dear sir the payment gateway is not currently available
       </p>
       <p>
       Sorry for the inconvenience
       </p>
       <p>
        Our team is working on it
       </p>
      </div>
     </div>
     <div class="message">
      <img alt="Profile picture of Florencio Dorrance" height="40" src="https://storage.googleapis.com/a1aa/image/y5CWrxIHcB6yF5v2Mk2QmuU5iLHsBaAfxrpM2fJQ7pfOrMsnA.jpg" width="40"/>
      <div class="message-content">
       <p>
        Ahh ok
       </p>
       <p>
      I'll check it later
       </p>
       <p>
        Thank you.
       </p>
      </div>
     </div>
    </div>
    <div class="chat-input">
     <input placeholder="Type a message" type="text"/>
     <div class="send-btn">
      <i class="fas fa-paper-plane">
      </i>
     </div>
    </div>
   </div>
  </div>

</html>
