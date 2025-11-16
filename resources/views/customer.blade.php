<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Customer Filter UI</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #0B131A;
      color: #F5F7FA;
    }
    .card {
      background: #101A22;
      border-radius: 20px;
      border: none;
    }
    .form-control, .form-select {
      background: #0F1A22;
      border: 1px solid #2A3A48;
      color: #F5F7FA;
    }
    .form-control:focus, .form-select:focus {
      box-shadow: none;
      border-color: #81CBC0;
    }
    .table thead {
      background: #081018;
      color: #81CBC0;
    }
  </style>
</head>

<body>

<div class="container py-5">


  <div class="card p-4 mb-4">
    <h3 class="mb-4 text-white">Filter Customers</h3>
    <form method="GET" action="{{ route('customer.index') }}">
    <div class="row g-3">

        <!-- Gender Filter -->
        <div class="col-md-4">
            <label class="form-label text-white">Gender</label>
            <select name="gender" class="form-select">
                <option value="">All</option>
                <option value="Male" {{ request('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ request('gender') == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <!-- Birthday Filter -->
        <div class="col-md-4">
            <label class="form-label text-white">Birthday</label>
            <select name="birthday" class="form-select">
                <option value="">All</option>
                <option value="after2000" {{ request('birthday') == 'after2000' ? 'selected' : '' }}>Born After 2000</option>
            </select>
        </div>

        <!-- Apply Button -->
        <div class="col-md-4 d-flex align-items-end">
            <button class="btn btn-info w-100">Apply Filter</button>
        </div>

    </div>
</form>

  </div>

  <!-- Table Section -->
  <div class="card p-4">
    <h3 class="mb-3 text-white">Customer List</h3>

    <div class="table-responsive">
      <table class="table table-dark table-hover">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Gender</th>
            <th>Birthday</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($customers as $customer)
            <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->address }}</td>
            <td>{{ $customer->phoneNumber }}</td>
            <td>{{ $customer->gender }}</td>
            <td>{{ date("d/m/Y", strtotime( $customer->birthday)) }}</td>
          </tr>

            @empty
                <tr>
                    <td colspan="6" class="text-center text-white">No data found</td>
                </tr>
            @endforelse

        </tbody>
      </table>
    </div>
  </div>
  <div>
    {{ $customers->links() }}
  </div>

</div>

</body>
</html>
