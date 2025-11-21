<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Customer Filter UI</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #0B131A;
      color: #FFFFFF;
    }

    .card {
      background: #111C24;
      border-radius: 20px;
      border: none;
      margin-bottom: 20px;
    }

    .form-control,
    .form-select {
      background: #0B131A;
      border: 1px solid #2A3A48;
      color: white;
    }

    .pagination .page-link {
      background-color: #0B131A;
      border: 1px solid #2A3A48;
      color: white;
    }

    .pagination .page-item.active .page-link {
      background-color: #0d6efd;
      color: white;
      border-color: #0d6efd;
    }

    .pagination .page-link:hover {
      background-color: #2A3A48;
      color: white;
    }
  </style>
</head>

<body>

  <div class="container py-5">

    <!-- Filter Form -->
    <div class="card p-4">
      <h3 class="mb-4 text-white">Filter Customers</h3>
      <form method="GET" action="{{ route('customer.index') }}">
        <div class="row g-3">
          <div class="col-md-4">
            <label class="form-label text-white">Gender</label>
            <select name="gender" class="form-select">
              <option selectedvalue>All</option>
              <option value="Male" {{ request('gender') == 'Male' ? 'selected' : '' }}>Male</option>
              <option value="Female" {{ request('gender') == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
          </div>

          <div class="col-md-4">
            <label class="form-label text-white">Birthday</label>
            <select name="birthday" class="form-select">
              <option Selected>All</option>
              <option value="after2000" {{ request('birthday') == 'after2000' ? 'selected' : '' }}>Born After 2000</option>
            </select>
          </div>

          <div class="col-md-4 d-flex align-items-end">
            <button type="button" class="btn btn-primary w-100">Apply Filter</button>
          </div>
        </div>
      </form>
    </div>

    <!-- Customer Table -->
    <div class="card p-4">
      <h3 class="mb-3 text-white">Customer List</h3>

      <div class="table-responsive">
        <table class="table table-dark table-striped table-hover mb-0">
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
              <td>{{ date("d/m/Y", strtotime($customer->birthday)) }}</td>
            </tr>
            @empty
            <tr>
              <td colspan="6" class="text-center">No data found</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>

<div class="d-flex justify-content-between align-items-start mt-4">
  <div style="color: #0d6dfd83">
    Showing {{ $customers->firstItem() ?? 0 }} to {{ $customers->lastItem() ?? 0 }} of {{ $customers->total() }} results
  </div>
  <div>
    {{ $customers->links('pagination::bootstrap-5') }}
  </div>
</div>



    </div>

  </div>

</body>

</html>