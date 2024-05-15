<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./style/ordermaindashboard.css">

  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.5/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
<div class="navbar bg-base-100">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a>Home</a></li>
                    <li>
                        <a>Operation</a>
                        <ul class="p-2">
                            <li><a> Order Manage</a></li>

                        </ul>
                    </li>
                    <li><a>About us</a></li>
                    <li><a>Comminication</a></li>
                </ul>
            </div>
            <a class="btn btn-ghost text-xl">MENDIS</a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a>Home</a></li>
                <li>
                    <details>
                        <summary>Operations</summary>
                        <ul class="p-2">
                            <li><a> Order Manage</a></li>

                        </ul>
                    </details>
                </li>
                <li><a href="aboutus.php">About us</a></li>
                <li><a href="communication.php">Comminication</a></li>
            </ul>
        </div>
        <div class="navbar-end">
            <a class="btn" href="logout.php">Log Out</a>
        </div>
    </div>



  <aside>
    <div class="container">
      <h2>Sidebar</h2>
      <ul>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Tasks</a></li>
        <li><a href="createorder.php">Add new Order</a></li>
      </ul>
    </div>
  </aside>

  <main>
    <div class="container">
      <h2></h2>
      <!-- Your main content here -->
      <div class="hero min-h-screen bg-base-100">
        <div class="hero-content flex-col lg:flex-row-reverse">
          <img src="./images/project.png" class="max-w-sm rounded-lg shadow-2xl" />
          <div>
            <h1 class="text-5xl font-bold">Order Manager Dashboard</h1>
            <button class="btn btn-primary" onclick="goToOrder()">Manage</button>
          </div>
        </div>
      </div>
      <br />

      <div tabindex="0" class="collapse border border-base-300 bg-base-200">
        <center>
          <div class="collapse-title text-xl font-medium">
            Order Details </div>
        </center>
        <div class="collapse-content">
        </div>
      </div>

    </div>
    <div class="overflow-x-auto">
      <table class="table">
        <!-- head -->
        <thead>
          <tr>
            <th>
              <label>
                <input type="checkbox" class="checkbox" />
              </label>
            </th>
            <th>Name</th>
            <th>Order</th>
            <th> Order ID</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <!-- row 1 -->
          <tr>
            <th>
              <label>
                <input type="checkbox" class="checkbox" />
              </label>
            </th>
            <td>
              <div class="flex items-center gap-3">
                <div class="avatar">
                  <div class="mask mask-squircle w-12 h-12">
                    <img src="https://img.daisyui.com/tailwind-css-component-profile-2@56w.png" alt="Avatar Tailwind CSS Component" />
                  </div>
                </div>
                <div>
                  <div class="font-bold">Hart Hagerty</div>
                  <div class="text-sm opacity-50"></div>
                </div>
              </div>
            </td>
            <td>

              <br />
              <span class="badge badge-ghost badge-sm">Desktop Support Technician</span>
            </td>
            <td></td>
            <th>
              <button class="btn btn-ghost btn-xs">details</button>
            </th>
          </tr>
          <!-- row 2 -->
          <tr>
            <th>
              <label>
                <input type="checkbox" class="checkbox" />
              </label>
            </th>
            <td>
              <div class="flex items-center gap-3">
                <div class="avatar">
                  <div class="mask mask-squircle w-12 h-12">
                    <img src="https://img.daisyui.com/tailwind-css-component-profile-3@56w.png" alt="Avatar Tailwind CSS Component" />
                  </div>
                </div>
                <div>
                  <div class="font-bold">Brice Swyre</div>
                  <div class="text-sm opacity-50">China</div>
                </div>
              </div>
            </td>
            <td>
              Carroll Group
              <br />
              <span class="badge badge-ghost badge-sm">Tax Accountant</span>
            </td>
            <td></td>
            <th>
              <button class="btn btn-ghost btn-xs">details</button>
            </th>
          </tr>
          <!-- row 3 -->
          <tr>
            <th>
              <label>
                <input type="checkbox" class="checkbox" />
              </label>
            </th>
            <td>
              <div class="flex items-center gap-3">
                <div class="avatar">
                  <div class="mask mask-squircle w-12 h-12">
                    <img src="https://img.daisyui.com/tailwind-css-component-profile-4@56w.png" alt="Avatar Tailwind CSS Component" />
                  </div>
                </div>
                <div>
                  <div class="font-bold">Marjy Ferencz</div>
                  <div class="text-sm opacity-50">Russia</div>
                </div>
              </div>
            </td>
            <td>

              <br />
              <span class="badge badge-ghost badge-sm">Office Assistant I</span>
            </td>
            <td></td>
            <th>
              <button class="btn btn-ghost btn-xs">details</button>
            </th>
          </tr>
          <!-- row 4 -->
          <tr>
            <th>
              <label>
                <input type="checkbox" class="checkbox" />
              </label>
            </th>
            <td>
              <div class="flex items-center gap-3">
                <div class="avatar">
                  <div class="mask mask-squircle w-12 h-12">
                    <img src="https://img.daisyui.com/tailwind-css-component-profile-5@56w.png" alt="Avatar Tailwind CSS Component" />
                  </div>
                </div>
                <div>
                  <div class="font-bold">Yancy Tear</div>
                  <div class="text-sm opacity-50">Brazil</div>
                </div>
              </div>
            </td>
            <td>

              <br />
              <span class="badge badge-ghost badge-sm">Community Outreach Specialist</span>
            </td>
            <td></td>
            <th>
              <button class="btn btn-ghost btn-xs">details</button>
            </th>
          </tr>
        </tbody>
        <!-- foot -->
        <tfoot>
          <tr>
            <th></th>
            <th>Name</th>
            <th>order</th>
            <th>order ID</th>
            <th></th>
          </tr>
        </tfoot>

      </table>
    </div>
    <br />
    <br />
    <div tabindex="0" class="collapse border border-base-300 bg-base-200">
      <center>
        <div class="collapse-title text-xl font-medium">
          Chart </div>
      </center>
      <div class="collapse-content">
      </div>
    </div>


    <img src="./images/Pie-Chart.png" class="max-w-sm rounded-lg shadow-2xl" />

    </div>
    <br />
    <br />
    <br />
    <br />
    <br />
    <center>
      <ul class="timeline">
        <li>
          <div class="timeline-start timeline-box">Get Start</div>
          <div class="timeline-middle">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-primary">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
            </svg>
          </div>
          <hr class="bg-primary" />
        </li>
        <li>
          <hr class="bg-primary" />
          <div class="timeline-middle">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-primary">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
            </svg>
          </div>
          <div class="timeline-end timeline-box">plan</div>
          <hr class="bg-primary" />
        </li>
        <li>
          <hr class="bg-primary" />
          <div class="timeline-start timeline-box">discuss</div>
          <div class="timeline-middle">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-primary">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
            </svg>
          </div>
          <hr />
        </li>
        <li>
          <hr />
          <div class="timeline-middle">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
            </svg>
          </div>
          <div class="timeline-end timeline-box">design</div>
          <hr />
        </li>
        <li>
          <hr />
          <div class="timeline-start timeline-box">Start project</div>
          <div class="timeline-middle">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
            </svg>
          </div>
        </li>
      </ul>
  </main>
  </center>

  <script>
    function goToOrder() {
      window.location.href = 'orderdashboard.php';
    }
  </script>


  <?php
  include 'footer.php';
  ?>


</body>

</html>