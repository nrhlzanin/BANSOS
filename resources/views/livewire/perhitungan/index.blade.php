<div class="card mt-4">
    <div class="card-body">
      <div class="table-responsive mt-3">
        <div class="row">
          <div class="col-md-6">
            <label for="showEntries">Show entries:</label>
            <select class="form-control" id="showEntries">
              <option value="10">10</option>
              <option value="25">25</option>
              <option value="50">50</option>
              <option value="100">100</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="search">Search:</label>
            <input type="text" class="form-control" id="search">
          </div>
        </div>
        <div class="card-header">
            <h3>Hasil Analisa</h3>
          </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Alternatif</th>
              <th>Kriteria 1</th>
              <th>Kriteria 2</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Alternatif 1</td>
              <td>...</td>
              <td>...</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Alternatif 2</td>
              <td>...</td>
              <td>...</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="row right-content-between mt-3">
        <div class="col-md-6">
          <nav aria-label="Pagination">
            <ul class="pagination right-content-end">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
  