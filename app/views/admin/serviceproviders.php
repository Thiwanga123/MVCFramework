<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/Dashboard.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/Common/MyInventory.css">
    <title>Service Providers-Admin</title>
</head>
<body>

<div class="box">
    <!-- SideBar -->
        <?php require APPROOT . '/views/inc/components/adminsidebar.php'; ?>
     <!-- End Of Sidebar -->

     <!--Main Content-->
     <div class="content">
        <!--navbar-->
        <nav>
            <svg class="menu" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M160-269.23v-40h640v40H160ZM160-460v-40h640v40H160Zm0-190.77v-40h640v40H160Z"/></svg>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search ..">
                    <button class="search-btn" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
                    </button>
                </div>
            </form>
            <a href="#" class="updates">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z"/></svg>
                <span class="count">12</span>
            </a>
            <p>Hii Welcome <?php echo isset($_SESSION['name']) ? ' ' . htmlspecialchars($_SESSION['name']) : ''; ?> </p>
            <a href="#" class="profile">
            <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
            </a>
        </nav>

        <main>
            <div class="header">
                <div class="left">
                    <h1 id = "header-title"> Service Providers</h1>
                </div>
            </div>
        
            <!--Insights-->
            <ul class="insights">
                <li>
                    <div class="products">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M120-120v-560h160v-160h400v320h160v400H520v-160h-80v160H120Zm80-80h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm160 160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm160 320h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm160 480h80v-80h-80v80Zm0-160h80v-80h-80v80Z"/></svg>
                    </div>
                    <span class = "info">
                        <h3><?php echo $data['accomadation_suppliers'];?></h3>
                        <p> Accomodation Supppliers</p>
                    </span>
                </li>
                <li>
                    <div class="view">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M240-200v40q0 17-11.5 28.5T200-120h-40q-17 0-28.5-11.5T120-160v-320l84-240q6-18 21.5-29t34.5-11h440q19 0 34.5 11t21.5 29l84 240v320q0 17-11.5 28.5T800-120h-40q-17 0-28.5-11.5T720-160v-40H240Zm-8-360h496l-42-120H274l-42 120Zm-32 80v200-200Zm100 160q25 0 42.5-17.5T360-380q0-25-17.5-42.5T300-440q-25 0-42.5 17.5T240-380q0 25 17.5 42.5T300-320Zm360 0q25 0 42.5-17.5T720-380q0-25-17.5-42.5T660-440q-25 0-42.5 17.5T600-380q0 25 17.5 42.5T660-320Zm-460 40h560v-200H200v200Z"/></svg>
                    </div>
                    <span class = "info">
                        <h3><?php echo $data['vehicle_suppliers'];?></h3>
                        <p>Transport Suppliers</p>
                    </span>
                </li>
                <li>
                    <div class="earnings">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="m600-120-240-84-186 72q-20 8-37-4.5T120-170v-560q0-13 7.5-23t20.5-15l212-72 240 84 186-72q20-8 37 4.5t17 33.5v560q0 13-7.5 23T812-192l-212 72Zm-40-98v-468l-160-56v468l160 56Zm80 0 120-40v-474l-120 46v468Zm-440-10 120-46v-468l-120 40v474Zm440-458v468-468Zm-320-56v468-468Z"/></svg>
                    </div>
                    <span class = "info">
                        <h3><?php echo $data['tour_guides'];?></h3>
                        <p>Guide Services</p>
                    </span>
                </li>
                <li>
                    <div class="pendings">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M754-81q-8 0-15-2.5T726-92L522-296q-6-6-8.5-13t-2.5-15q0-8 2.5-15t8.5-13l85-85q6-6 13-8.5t15-2.5q8 0 15 2.5t13 8.5l204 204q6 6 8.5 13t2.5 15q0 8-2.5 15t-8.5 13l-85 85q-6 6-13 8.5T754-81Zm0-95 29-29-147-147-29 29 147 147ZM205-80q-8 0-15.5-3T176-92l-84-84q-6-6-9-13.5T80-205q0-8 3-15t9-13l212-212h85l34-34-165-165h-57L80-765l113-113 121 121v57l165 165 116-116-43-43 56-56H495l-28-28 142-142 28 28v113l56-56 142 142q17 17 26 38.5t9 45.5q0 24-9 46t-26 39l-85-85-56 56-42-42-207 207v84L233-92q-6 6-13 9t-15 3Zm0-96 170-170v-29h-29L176-205l29 29Zm0 0-29-29 15 14 14 15Zm549 0 29-29-29 29Z"/></svg>
                    </div>
                    <span class = "info">
                        <h3><?php echo $data['equipment_suppliers'];?></h3>
                        <p>Equipment Suppliers</p>
                    </span>
                </li>
            </ul>
            <!--End of Insights-->
        
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M120-80v-800l60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60v800l-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60Zm120-200h480v-80H240v80Zm0-160h480v-80H240v80Zm0-160h480v-80H240v80Zm-40 404h560v-568H200v568Zm0-568v568-568Z"/></svg>
                        <h3>Recently Joined</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-160q-17 0-28.5-11.5T400-200v-240L168-736q-15-20-4.5-42t36.5-22h560q26 0 36.5 22t-4.5 42L560-440v240q0 17-11.5 28.5T520-160h-80Zm40-308 198-252H282l198 252Zm0 0Z"/></svg>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Service Provider Name</th>
                                <th>Date of Joined</th>
                                <th>Status</th>
                                <th>Service Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php foreach($data['last_three_service_providers'] as $last_three_service_providers) : ?>
                            <tr>
                                <td>
                                <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
                                    <p><?php echo htmlspecialchars($last_three_service_providers->name); ?></p>
                                </td>
                                <td><?php echo htmlspecialchars(date("Y/m/d", strtotime($last_three_service_providers->date_of_joined))); ?></td>
                                <td><?php echo htmlspecialchars($last_three_service_providers->action); ?></td>
                                <td><?php echo htmlspecialchars($last_three_service_providers->sptype); ?></td>
                                <td class="action-buttons">
                                <!--when click on view-btn open the pop up and show details-->
                                <button class="view-btn">View</button>
                                <button class="delete-btn" id="delete-btn">Delete</button>
                                </td>
                            </tr>
                <?php endforeach; ?>
                        </tbody>
                    </table> 
                </div>
        
                <!--Recent updates-->
                <div class="reminders">
                    <div class="header">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M222-200 80-342l56-56 85 85 170-170 56 57-225 226Zm0-320L80-662l56-56 85 85 170-170 56 57-225 226Zm298 240v-80h360v80H520Zm0-320v-80h360v80H520Z"/></svg>
                        <h3>List to Approve</h3>
        
                    </div>
                    <ul class="update-list">
                        <?php foreach ($data['unapproved_service_providers'] as $unapproved_service_providers) : ?>
                        <li>
                            <div class="update" 
                                 data-sptype="<?php echo htmlspecialchars($unapproved_service_providers->sptype); ?>" 
                                 data-email="<?php echo htmlspecialchars($unapproved_service_providers->email); ?>" 
                                 data-phone="<?php echo htmlspecialchars($unapproved_service_providers->phone); ?>" 
                                 data-nic="<?php echo htmlspecialchars($unapproved_service_providers->nic); ?>" 
                                 data-reg-number="<?php echo htmlspecialchars($unapproved_service_providers->reg_number); ?>" 
                                 data-address="<?php echo htmlspecialchars($unapproved_service_providers->address); ?>" 
                                 data-plan="<?php echo htmlspecialchars($unapproved_service_providers->plan); ?>" 
                                 data-sub="<?php echo htmlspecialchars($unapproved_service_providers->sub); ?>" 
                                 data-document-path="<?php echo URLROOT . '/' . htmlspecialchars($unapproved_service_providers->document_path); ?>"
                                 data-id="<?php echo htmlspecialchars($unapproved_service_providers->serviceProviderId); ?>">
                                <img src="<?php echo URLROOT; ?>/Images/Profile pic.jpg">
                                <div class="update-info">
                                    <div class="name-info">
                                        <p><?php echo htmlspecialchars($unapproved_service_providers->name); ?></p>
                                    </div>
                                    <div class="service-info">
                                        <p><?php echo htmlspecialchars($unapproved_service_providers->sptype); ?></p>
                                    </div>
                                    <div class="action-buttons">
                                    
                                        <button class="view-btn">View</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        
          </main>

     </div>
    
     </div>   

    <!-- Modal for viewing details -->
    <div id="view-modal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2>Service Provider Details</h2>
            <div id="modal-details">
                <!-- Details will be dynamically populated here -->
            </div>
            <div class="modal-actions">
                <button class="approve-btn-modal">Approve</button>
                <button class="reject-btn-modal">Reject</button>
            </div>
        </div>
    </div>

    <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('view-modal');
            const closeModal = document.querySelector('.close-btn');
            const viewButtons = document.querySelectorAll('.view-btn');
            const approveModalButton = document.querySelector('.approve-btn-modal');
            const rejectModalButton = document.querySelector('.reject-btn-modal'); // Added reject button

            viewButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    const parent = e.target.closest('.update');
                    const name = parent.querySelector('.name-info p').textContent;
                    const serviceType = parent.dataset.sptype;

                    const email = parent.dataset.email;
                    const phone = parent.dataset.phone;
                    const nic = parent.dataset.nic;
                    const regNumber = parent.dataset.regNumber;
                    const address = parent.dataset.address;
                    const documentPath = parent.dataset.documentPath;
                    const plan = parent.dataset.plan;
                    const sub = parent.dataset.sub === 'true' ? 'Yes' : 'No';
                    const serviceProviderId = parent.dataset.id;

                    // Populate modal with all details
                    const modalDetails = document.getElementById('modal-details');
                    modalDetails.dataset.serviceProviderId = serviceProviderId; // Set data-id
                    modalDetails.dataset.sptype = serviceType; // Set data-sptype
                    modalDetails.innerHTML = `
                        <p><strong>Service Provider ID:</strong> ${serviceProviderId}</p>
                        <p><strong>Name:</strong> ${name}</p>
                        <p><strong>Service Type:</strong> ${serviceType}</p>
                        <p><strong>Email:</strong> ${email}</p>
                        <p><strong>Phone:</strong> ${phone}</p>
                        <p><strong>NIC:</strong> ${nic}</p>
                        <p><strong>Registration Number:</strong> ${regNumber}</p>
                        <p><strong>Address:</strong> ${address}</p>
                        <p><strong>Subscription Plan:</strong> ${plan}</p>
                        <p><strong>Subscription Purchased:</strong> <span style="color: ${sub === 'Yes' ? 'green' : 'red'};">${sub}</span></p>
                        ${
                            documentPath
                                ? `<p><strong>Document:</strong> <a href="${documentPath}" target="_blank" style="color: #007BFF; text-decoration: underline;">View Document</a></p>`
                                : ''
                        }
                    `;

                    // Show modal
                    modal.style.display = 'flex';
                });
            });

            approveModalButton.addEventListener('click', () => {
                // Retrieve the service provider ID and type from the modal
                const modalDetails = document.getElementById('modal-details');
                const serviceProviderId = modalDetails.dataset.serviceProviderId;
                const sptype = modalDetails.dataset.sptype;

                if (!serviceProviderId || !sptype) {
                    alert('Error: Missing service provider ID or type.');
                    return;
                }

                // Send an AJAX request to approve the service provider
                fetch('<?php echo URLROOT; ?>/admin/approveServiceProvider', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ serviceProviderId: serviceProviderId, sptype: sptype ,action: 'approve' }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Service provider approved successfully!');
                        window.location.reload(); // Reload the page to reflect changes
                    } else {
                        alert('Failed to approve service provider. Check logs for details.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while approving the service provider.');
                });
            });

            rejectModalButton.addEventListener('click', () => {
                // Retrieve the service provider ID and type from the modal
                const modalDetails = document.getElementById('modal-details');
                const serviceProviderId = modalDetails.dataset.serviceProviderId;
                const sptype = modalDetails.dataset.sptype;

                if (!serviceProviderId || !sptype) {
                    alert('Error: Missing service provider ID or type.');
                    return;
                }

                // Send an AJAX request to reject the service provider
                fetch('<?php echo URLROOT; ?>/admin/approveServiceProvider', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ serviceProviderId: serviceProviderId, sptype: sptype, action: 'reject' }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Service provider rejected successfully!');
                        window.location.reload(); // Reload the page to reflect changes
                    } else {
                        alert('Failed to reject service provider. Check logs for details.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while rejecting the service provider.');
                });
            });

            closeModal.addEventListener('click', () => {
                modal.style.display = 'none';
            });

            window.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.style.display = 'none';
                }
            });
        });
    </script>
    <style>
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(173, 216, 230, 0.8); /* Light blue overlay */
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        .modal-content {
            background: #f0f8ff; /* Alice blue */
            padding: 25px;
            border-radius: 12px;
            width: 45%;
            max-width: 550px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            text-align: left;
            position: relative;
            animation: fadeIn 0.3s ease-in-out;
        }
        .modal-content h2 {
            margin-top: 0;
            font-size: 24px;
            color: #0056b3; /* Dark blue */
            border-bottom: 2px solid #87ceeb; /* Sky blue */
            padding-bottom: 10px;
        }
        .modal-content p {
            font-size: 16px;
            color: #333;
            margin: 10px 0;
        }
        .modal-actions {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        .approve-btn-modal, .reject-btn-modal {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .approve-btn-modal {
            background-color: #28a745; /* Green */
            color: #fff;
        }
        .approve-btn-modal:hover {
            background-color: #218838;
        }
        .reject-btn-modal {
            background-color: #dc3545; /* Red */
            color: #fff;
        }
        .reject-btn-modal:hover {
            background-color: #c82333;
        }
        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 22px;
            font-weight: bold;
            color: #0056b3; /* Dark blue */
            cursor: pointer;
            transition: color 0.3s ease;
        }
        .close-btn:hover {
            color: #ff4500; /* Orange red */
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</body>
</html>