<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/adminpage/Dashboard.css">
    <title>Earnings-Admin</title>
</head>
<body>
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
                    <h1 id = "header-title"> Earnings</h1>
                </div>
            </div>
        
            <!--Insights-->
            <ul class="insights">
                <li>
                    <div class="products">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M441-120v-86q-53-12-91.5-46T293-348l74-30q15 48 44.5 73t77.5 25q41 0 69.5-18.5T587-356q0-35-22-55.5T463-458q-86-27-118-64.5T313-614q0-65 42-101t86-41v-84h80v84q50 8 82.5 36.5T651-650l-74 32q-12-32-34-48t-60-16q-44 0-67 19.5T393-614q0 33 30 52t104 40q69 20 104.5 63.5T667-358q0 71-42 108t-104 46v84h-80Z"/></svg>
                    </div>
                    <span class = "info">
                        <h3>Rs.150,000.00</h3>
                        <p> Current Month Earnings </p>
                    </span>
                </li>
                <li>
                    <div class="view">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M440-200h80v-40h40q17 0 28.5-11.5T600-280v-120q0-17-11.5-28.5T560-440H440v-40h160v-80h-80v-40h-80v40h-40q-17 0-28.5 11.5T360-520v120q0 17 11.5 28.5T400-360h120v40H360v80h80v40ZM240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h320l240 240v480q0 33-23.5 56.5T720-80H240Zm280-560v-160H240v640h480v-480H520ZM240-800v160-160 640-640Z"/></svg>
                    </div>
                    <span class = "info">
                        <h3>Rs.100,000.00</h3>
                        <p>Last Month Earnings</p>
                    </span>
                </li>
                <li>
                    <div class="earnings">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m140-220-60-60 300-300 160 160 284-320 56 56-340 384-160-160-240 240Z"/></svg>
                    </div>
                    <span class = "info">
                        <h3>Rs.100,0000.00</h3>
                        <p>Payments for Service Providers</p>
                    </span>
                </li>
                <li>
                    <div class="pendings">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M640-520q17 0 28.5-11.5T680-560q0-17-11.5-28.5T640-600q-17 0-28.5 11.5T600-560q0 17 11.5 28.5T640-520Zm-320-80h200v-80H320v80ZM180-120q-34-114-67-227.5T80-580q0-92 64-156t156-64h200q29-38 70.5-59t89.5-21q25 0 42.5 17.5T720-820q0 6-1.5 12t-3.5 11q-4 11-7.5 22.5T702-751l91 91h87v279l-113 37-67 224H480v-80h-80v80H180Zm60-80h80v-80h240v80h80l62-206 98-33v-141h-40L620-720q0-20 2.5-38.5T630-796q-29 8-51 27.5T547-720H300q-58 0-99 41t-41 99q0 98 27 191.5T240-200Zm240-298Z"/></svg>
                    </div>
                    <span class = "info">
                        <h3>Rs.50,000.00</h3>
                        <p>Total Profit</p>
                    </span>
                </li>
            </ul>
            <!--End of Insights-->
        
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M120-80v-800l60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60v800l-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60-60-60-60 60Zm120-200h480v-80H240v80Zm0-160h480v-80H240v80Zm0-160h480v-80H240v80Zm-40 404h560v-568H200v568Zm0-568v568-568Z"/></svg>
                        <h3>Recent Transactions</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-160q-17 0-28.5-11.5T400-200v-240L168-736q-15-20-4.5-42t36.5-22h560q26 0 36.5 22t-4.5 42L560-440v240q0 17-11.5 28.5T520-160h-80Zm40-308 198-252H282l198 252Zm0 0Z"/></svg>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Customer ID</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
                                    <p>Haseena Norish</p>
                                </td>
                                <td>1005</td>
                                <td>21-08-2024</td>
                                <td>Rs.10,000.00</td>
                                <td >
                                    <svg width="50px" height="50px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M894.509511 249.605689H330.752a37.660444 37.660444 0 0 0-37.546667 37.762844v342.448356a37.660444 37.660444 0 0 0 37.546667 37.762844h563.757511a37.660444 37.660444 0 0 0 37.558045-37.762844V287.368533a37.660444 37.660444 0 0 0-37.558045-37.762844z" fill="#CCCCCC" /><path d="M293.216711 333.585067H932.067556v97.655466H293.216711z" fill="#4D4D4D" /><path d="M688.685511 388.278044H124.928a37.660444 37.660444 0 0 0-37.546667 37.762845v342.448355a37.660444 37.660444 0 0 0 37.546667 37.762845h563.757511a37.660444 37.660444 0 0 0 37.546667-37.762845V426.040889a37.660444 37.660444 0 0 0-37.546667-37.762845z" fill="#FFCA6C" /><path d="M87.381333 472.257422h638.850845v97.655467H87.381333z" fill="#4D4D4D" /><path d="M213.595022 692.974933a58.595556 58.254222 90 1 0 116.508445 0 58.595556 58.254222 90 1 0-116.508445 0Z" fill="#47A7DD" /><path d="M155.3408 692.974933a58.595556 58.254222 90 1 0 116.508444 0 58.595556 58.254222 90 1 0-116.508444 0Z" fill="#FC583D" /><path d="M894.509511 234.951111H720.406756c-8.044089 0-14.563556 6.5536-14.563556 14.6432s6.519467 14.654578 14.563556 14.654578h174.102755c12.686222 0 22.994489 10.376533 22.994489 23.131022v31.561956H307.768889V287.379911c0-12.754489 10.308267-23.131022 22.994489-23.131022H671.857778c8.044089 0 14.552178-6.564978 14.552178-14.654578S679.913244 234.951111 671.869156 234.951111h-341.105778c-28.740267 0-52.1216 23.517867-52.1216 52.417422v86.254934H124.928c-28.728889 0-52.110222 23.517867-52.110222 52.417422V663.665778c0 8.100978 6.519467 14.654578 14.563555 14.654578 8.044089 0 14.563556-6.564978 14.563556-14.654578v-79.086934h609.723733v183.9104c0 12.743111-10.308267 23.108267-22.983111 23.108267H124.928a23.074133 23.074133 0 0 1-22.983111-23.108267v-55.990044c0-8.0896-6.519467-14.6432-14.563556-14.6432-8.044089 0-14.563556 6.5536-14.563555 14.6432v55.990044c0 28.899556 23.381333 52.406044 52.110222 52.406045h563.757511c28.728889 0 52.110222-23.506489 52.110222-52.406045V426.040889c0-28.899556-23.381333-52.417422-52.110222-52.417422H307.780267v-25.383823h609.735111v68.357689H772.846933c-8.044089 0-14.563556 6.5536-14.563555 14.6432s6.519467 14.654578 14.563555 14.654578h144.668445v183.9104a23.096889 23.096889 0 0 1-22.994489 23.131022H774.781156c-8.044089 0-14.552178 6.5536-14.552178 14.6432s6.508089 14.6432 14.552178 14.6432h119.728355c28.728889 0 52.1216-23.506489 52.1216-52.417422V287.379911C946.631111 258.468978 923.249778 234.951111 894.509511 234.951111z m-182.840889 191.089778v31.573333H178.642489c-8.044089 0-14.563556 6.5536-14.563556 14.6432s6.519467 14.654578 14.563556 14.654578h533.026133v68.357689H101.944889v-68.357689h28.16c8.044089 0 14.563556-6.564978 14.563555-14.654578s-6.519467-14.6432-14.563555-14.6432H101.944889v-31.573333c0-12.743111 10.308267-23.119644 22.983111-23.119645h563.757511a23.096889 23.096889 0 0 1 22.983111 23.119645z" fill="" /><path d="M242.744889 760.069689a72.100978 72.100978 0 0 0 29.104355 6.155378c40.152178 0 72.817778-32.8704 72.817778-73.250134 0-40.402489-32.6656-73.250133-72.817778-73.250133-10.069333 0-19.979378 2.127644-29.104355 6.132622a72.078222 72.078222 0 0 0-29.149867-6.132622c-40.152178 0-72.817778 32.847644-72.817778 73.250133 0 40.379733 32.6656 73.250133 72.817778 73.250134 10.365156 0 20.218311-2.218667 29.149867-6.155378z m72.795022-67.094756c0 24.223289-19.603911 43.9296-43.690667 43.9296h-0.034133a73.056711 73.056711 0 0 0 14.609067-43.9296 73.079467 73.079467 0 0 0-14.609067-43.952355h0.034133c24.098133 0 43.690667 19.706311 43.690667 43.952355z m-145.624178 0c0-24.246044 19.592533-43.952356 43.690667-43.952355 24.086756 0 43.690667 19.706311 43.690667 43.952355 0 24.223289-19.603911 43.9296-43.690667 43.9296-24.098133 0.011378-43.690667-19.706311-43.690667-43.9296zM655.633067 647.5776c8.032711 0 14.563556-6.5536 14.563555-14.6432s-6.530844-14.6432-14.563555-14.6432H440.103822c-8.044089 0-14.563556 6.5536-14.563555 14.6432s6.519467 14.6432 14.563555 14.6432h215.529245z" fill="" /></svg>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
                                    <p>Megha Pawan</p>
                                </td>
                                <td>1006</td>
                                <td>14-07-2024</td>
                                
                                <td>Rs.10,000.00</td>
                                <td >
                                    <svg width="50px" height="50px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M894.509511 249.605689H330.752a37.660444 37.660444 0 0 0-37.546667 37.762844v342.448356a37.660444 37.660444 0 0 0 37.546667 37.762844h563.757511a37.660444 37.660444 0 0 0 37.558045-37.762844V287.368533a37.660444 37.660444 0 0 0-37.558045-37.762844z" fill="#CCCCCC" /><path d="M293.216711 333.585067H932.067556v97.655466H293.216711z" fill="#4D4D4D" /><path d="M688.685511 388.278044H124.928a37.660444 37.660444 0 0 0-37.546667 37.762845v342.448355a37.660444 37.660444 0 0 0 37.546667 37.762845h563.757511a37.660444 37.660444 0 0 0 37.546667-37.762845V426.040889a37.660444 37.660444 0 0 0-37.546667-37.762845z" fill="#FFCA6C" /><path d="M87.381333 472.257422h638.850845v97.655467H87.381333z" fill="#4D4D4D" /><path d="M213.595022 692.974933a58.595556 58.254222 90 1 0 116.508445 0 58.595556 58.254222 90 1 0-116.508445 0Z" fill="#47A7DD" /><path d="M155.3408 692.974933a58.595556 58.254222 90 1 0 116.508444 0 58.595556 58.254222 90 1 0-116.508444 0Z" fill="#FC583D" /><path d="M894.509511 234.951111H720.406756c-8.044089 0-14.563556 6.5536-14.563556 14.6432s6.519467 14.654578 14.563556 14.654578h174.102755c12.686222 0 22.994489 10.376533 22.994489 23.131022v31.561956H307.768889V287.379911c0-12.754489 10.308267-23.131022 22.994489-23.131022H671.857778c8.044089 0 14.552178-6.564978 14.552178-14.654578S679.913244 234.951111 671.869156 234.951111h-341.105778c-28.740267 0-52.1216 23.517867-52.1216 52.417422v86.254934H124.928c-28.728889 0-52.110222 23.517867-52.110222 52.417422V663.665778c0 8.100978 6.519467 14.654578 14.563555 14.654578 8.044089 0 14.563556-6.564978 14.563556-14.654578v-79.086934h609.723733v183.9104c0 12.743111-10.308267 23.108267-22.983111 23.108267H124.928a23.074133 23.074133 0 0 1-22.983111-23.108267v-55.990044c0-8.0896-6.519467-14.6432-14.563556-14.6432-8.044089 0-14.563556 6.5536-14.563555 14.6432v55.990044c0 28.899556 23.381333 52.406044 52.110222 52.406045h563.757511c28.728889 0 52.110222-23.506489 52.110222-52.406045V426.040889c0-28.899556-23.381333-52.417422-52.110222-52.417422H307.780267v-25.383823h609.735111v68.357689H772.846933c-8.044089 0-14.563556 6.5536-14.563555 14.6432s6.519467 14.654578 14.563555 14.654578h144.668445v183.9104a23.096889 23.096889 0 0 1-22.994489 23.131022H774.781156c-8.044089 0-14.552178 6.5536-14.552178 14.6432s6.508089 14.6432 14.552178 14.6432h119.728355c28.728889 0 52.1216-23.506489 52.1216-52.417422V287.379911C946.631111 258.468978 923.249778 234.951111 894.509511 234.951111z m-182.840889 191.089778v31.573333H178.642489c-8.044089 0-14.563556 6.5536-14.563556 14.6432s6.519467 14.654578 14.563556 14.654578h533.026133v68.357689H101.944889v-68.357689h28.16c8.044089 0 14.563556-6.564978 14.563555-14.654578s-6.519467-14.6432-14.563555-14.6432H101.944889v-31.573333c0-12.743111 10.308267-23.119644 22.983111-23.119645h563.757511a23.096889 23.096889 0 0 1 22.983111 23.119645z" fill="" /><path d="M242.744889 760.069689a72.100978 72.100978 0 0 0 29.104355 6.155378c40.152178 0 72.817778-32.8704 72.817778-73.250134 0-40.402489-32.6656-73.250133-72.817778-73.250133-10.069333 0-19.979378 2.127644-29.104355 6.132622a72.078222 72.078222 0 0 0-29.149867-6.132622c-40.152178 0-72.817778 32.847644-72.817778 73.250133 0 40.379733 32.6656 73.250133 72.817778 73.250134 10.365156 0 20.218311-2.218667 29.149867-6.155378z m72.795022-67.094756c0 24.223289-19.603911 43.9296-43.690667 43.9296h-0.034133a73.056711 73.056711 0 0 0 14.609067-43.9296 73.079467 73.079467 0 0 0-14.609067-43.952355h0.034133c24.098133 0 43.690667 19.706311 43.690667 43.952355z m-145.624178 0c0-24.246044 19.592533-43.952356 43.690667-43.952355 24.086756 0 43.690667 19.706311 43.690667 43.952355 0 24.223289-19.603911 43.9296-43.690667 43.9296-24.098133 0.011378-43.690667-19.706311-43.690667-43.9296zM655.633067 647.5776c8.032711 0 14.563556-6.5536 14.563555-14.6432s-6.530844-14.6432-14.563555-14.6432H440.103822c-8.044089 0-14.563556 6.5536-14.563555 14.6432s6.519467 14.6432 14.563555 14.6432h215.529245z" fill="" /></svg>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <img src="<?php echo URLROOT;?>/Images/Profile pic.jpg">
                                    <p>Sineth Sankalpa</p>
                                </td>
                                <td>1007</td>
                                <td>01-01-2024</td>
                                
                                <td>Rs.20,000.00</td>
                                <td >
                                    <svg width="50px" height="50px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M894.509511 249.605689H330.752a37.660444 37.660444 0 0 0-37.546667 37.762844v342.448356a37.660444 37.660444 0 0 0 37.546667 37.762844h563.757511a37.660444 37.660444 0 0 0 37.558045-37.762844V287.368533a37.660444 37.660444 0 0 0-37.558045-37.762844z" fill="#CCCCCC" /><path d="M293.216711 333.585067H932.067556v97.655466H293.216711z" fill="#4D4D4D" /><path d="M688.685511 388.278044H124.928a37.660444 37.660444 0 0 0-37.546667 37.762845v342.448355a37.660444 37.660444 0 0 0 37.546667 37.762845h563.757511a37.660444 37.660444 0 0 0 37.546667-37.762845V426.040889a37.660444 37.660444 0 0 0-37.546667-37.762845z" fill="#FFCA6C" /><path d="M87.381333 472.257422h638.850845v97.655467H87.381333z" fill="#4D4D4D" /><path d="M213.595022 692.974933a58.595556 58.254222 90 1 0 116.508445 0 58.595556 58.254222 90 1 0-116.508445 0Z" fill="#47A7DD" /><path d="M155.3408 692.974933a58.595556 58.254222 90 1 0 116.508444 0 58.595556 58.254222 90 1 0-116.508444 0Z" fill="#FC583D" /><path d="M894.509511 234.951111H720.406756c-8.044089 0-14.563556 6.5536-14.563556 14.6432s6.519467 14.654578 14.563556 14.654578h174.102755c12.686222 0 22.994489 10.376533 22.994489 23.131022v31.561956H307.768889V287.379911c0-12.754489 10.308267-23.131022 22.994489-23.131022H671.857778c8.044089 0 14.552178-6.564978 14.552178-14.654578S679.913244 234.951111 671.869156 234.951111h-341.105778c-28.740267 0-52.1216 23.517867-52.1216 52.417422v86.254934H124.928c-28.728889 0-52.110222 23.517867-52.110222 52.417422V663.665778c0 8.100978 6.519467 14.654578 14.563555 14.654578 8.044089 0 14.563556-6.564978 14.563556-14.654578v-79.086934h609.723733v183.9104c0 12.743111-10.308267 23.108267-22.983111 23.108267H124.928a23.074133 23.074133 0 0 1-22.983111-23.108267v-55.990044c0-8.0896-6.519467-14.6432-14.563556-14.6432-8.044089 0-14.563556 6.5536-14.563555 14.6432v55.990044c0 28.899556 23.381333 52.406044 52.110222 52.406045h563.757511c28.728889 0 52.110222-23.506489 52.110222-52.406045V426.040889c0-28.899556-23.381333-52.417422-52.110222-52.417422H307.780267v-25.383823h609.735111v68.357689H772.846933c-8.044089 0-14.563556 6.5536-14.563555 14.6432s6.519467 14.654578 14.563555 14.654578h144.668445v183.9104a23.096889 23.096889 0 0 1-22.994489 23.131022H774.781156c-8.044089 0-14.552178 6.5536-14.552178 14.6432s6.508089 14.6432 14.552178 14.6432h119.728355c28.728889 0 52.1216-23.506489 52.1216-52.417422V287.379911C946.631111 258.468978 923.249778 234.951111 894.509511 234.951111z m-182.840889 191.089778v31.573333H178.642489c-8.044089 0-14.563556 6.5536-14.563556 14.6432s6.519467 14.654578 14.563556 14.654578h533.026133v68.357689H101.944889v-68.357689h28.16c8.044089 0 14.563556-6.564978 14.563555-14.654578s-6.519467-14.6432-14.563555-14.6432H101.944889v-31.573333c0-12.743111 10.308267-23.119644 22.983111-23.119645h563.757511a23.096889 23.096889 0 0 1 22.983111 23.119645z" fill="" /><path d="M242.744889 760.069689a72.100978 72.100978 0 0 0 29.104355 6.155378c40.152178 0 72.817778-32.8704 72.817778-73.250134 0-40.402489-32.6656-73.250133-72.817778-73.250133-10.069333 0-19.979378 2.127644-29.104355 6.132622a72.078222 72.078222 0 0 0-29.149867-6.132622c-40.152178 0-72.817778 32.847644-72.817778 73.250133 0 40.379733 32.6656 73.250133 72.817778 73.250134 10.365156 0 20.218311-2.218667 29.149867-6.155378z m72.795022-67.094756c0 24.223289-19.603911 43.9296-43.690667 43.9296h-0.034133a73.056711 73.056711 0 0 0 14.609067-43.9296 73.079467 73.079467 0 0 0-14.609067-43.952355h0.034133c24.098133 0 43.690667 19.706311 43.690667 43.952355z m-145.624178 0c0-24.246044 19.592533-43.952356 43.690667-43.952355 24.086756 0 43.690667 19.706311 43.690667 43.952355 0 24.223289-19.603911 43.9296-43.690667 43.9296-24.098133 0.011378-43.690667-19.706311-43.690667-43.9296zM655.633067 647.5776c8.032711 0 14.563556-6.5536 14.563555-14.6432s-6.530844-14.6432-14.563555-14.6432H440.103822c-8.044089 0-14.563556 6.5536-14.563555 14.6432s6.519467 14.6432 14.563555 14.6432h215.529245z" fill="" /></svg>
                                </td>
                            </tr>
                        </tbody>
                    </table> 
                </div>
        
                <!--Recent updates-->
                <div class="reminders">
                    <div class="header">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h440l200 200v440q0 33-23.5 56.5T760-120H200Zm0-80h560v-400H600v-160H200v560Zm80-80h400v-80H280v80Zm0-320h200v-80H280v80Zm0 160h400v-80H280v80Zm-80-320v160-160 560-560Z"/></svg>
                        <h3>Earnings Summary</h3>
        
                    </div>
                    <ul class="update-list">
                        <li>Total Earnings: Rs.100,00,000.00</li>
                        <li>Total Expenses: Rs.50,00,000.00</li>
                        <li>Net Earnings: Rs.50,00,000.00</li>
                       
                    </ul>
                    <div class="earnings-image">
                        <img src="<?php echo URLROOT;?>/Images/earnings.jpg" alt="Earnings">
                    </div>
                </div>
            </div>
        
          </main>

     </div>

    
     <script src="<?php echo URLROOT;?>/js/Sidebar.js"></script>
</body>

</html>
