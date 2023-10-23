<x-CRM-layout :pageTitle="$pageTitle" :pageDescription="$pageDescription">
  <style>
    .grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      /* Creates a 2x2 grid */
      gap: 20px;
      /* Adjust the gap between cards as needed */
    }

    .card {
      background-color: white;
      /* Set card background color to white */
      border: none;
      /* Remove the card border */
      padding: 0;
      /* Remove padding to match grid size */
      width: 100%;
      /* Set card width to 100% to match grid size */
      display: flex;
      /* Use flex to stretch card content */
      flex-direction: column;
      /* Stack card content vertically */
    }

    .card-content {
      text-align: center;
      background-color: white;
      /* Set card content background color to white */
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 20px;
      flex: 1;
      /* Allow card content to stretch vertically */
    }

    .card-title {
      font-size: 18px;
      font-weight: bold;
      color: #16c1c0;
      /* Set card title text color to blue */
    }

    .card-text {
      font-size: 16px;
      color: #16c1c0;
      /* Set card text color to blue */
    }

    .card-count {
      font-size: 20px;
      font-weight: bold;
      color: #16c1c0;
      /* Set online user count text color to blue */
    }
  </style>
  <!--start::Include your modals here-->
  <div class="grid">
    <div class="card">
      <div class="card-content">
        <h5 class="card-title">Online Users</h5>
        <p class="card-text">Number of users currently online:</p>
        <p>Online Users: <span class="card-count" id="online-user-count">Loading...</span></p>
      </div>
    </div>

    <div class="card">
      <div class="card-content">
        <h5 class="card-title">Number Of Active Forms</h5>
        <p class="card-text">Number of forms currently active:</p>
        <p>Active Forms: <span class="card-count" id="active-form-count">Loading...</span></p>
      </div>
    </div>

    <div class="card">
      <div class="card-content">
        <h5 class="card-title">Number Of Active Projects</h5>
        <p class="card-text">Number of projects currently active:</p>
        <p>Active Projects: <span class="card-count" id="active-project-count">Loading...</span></p>
      </div>
    </div>

    <div class="card">
      <div class="card-content">
        <h5 class="card-title">Number Of Active Categories</h5>
        <p class="card-text">Number of categories currently active:</p>
        <p>Active Categories: <span class="card-count" id="active-category-count">Loading...</span></p>
      </div>
    </div>
  </div>


  <!--start::Include your scripts here-->
  @section('scripts')
  <script src="{{ '/custom/broadcast/formCount.js' }}"></script>
  <script src="{{ asset('/custom/broadcast/categoryCount.js') }}"></script>
  @endsection

  <!--start::Include your styles here-->
  @section('styles')

  @endsection

</x-CRM-layout>