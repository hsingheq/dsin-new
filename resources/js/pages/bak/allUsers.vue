<template>
    <div>
        <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Buttons Datatables</h5>
                </div>
                <div class="card-body">
                    <div id="buttons-datatables_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer"><div class="dt-buttons">          <button class="dt-button buttons-copy buttons-html5" tabindex="0" aria-controls="buttons-datatables" type="button"><span>Copy</span></button> <button class="dt-button buttons-csv buttons-html5" tabindex="0" aria-controls="buttons-datatables" type="button"><span>CSV</span></button> <button class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="buttons-datatables" type="button"><span>Excel</span></button> <button class="dt-button buttons-print" tabindex="0" aria-controls="buttons-datatables" type="button"><span>Print</span></button> <button class="dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="buttons-datatables" type="button"><span>PDF</span></button> </div><div id="buttons-datatables_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="buttons-datatables"></label></div><table id="buttons-datatables" class="display table table-bordered dataTable no-footer" style="width: 100%;" aria-describedby="buttons-datatables_info">
                        <thead>
                            <tr><th class="sorting sorting_asc" tabindex="0" aria-controls="buttons-datatables" rowspan="1" colspan="1" style="width: 163.4px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th><th class="sorting" tabindex="0" aria-controls="buttons-datatables" rowspan="1" colspan="1" style="width: 250.4px;" aria-label="Position: activate to sort column ascending">Position</th><th class="sorting" tabindex="0" aria-controls="buttons-datatables" rowspan="1" colspan="1" style="width: 118.4px;" aria-label="Office: activate to sort column ascending">Office</th><th class="sorting" tabindex="0" aria-controls="buttons-datatables" rowspan="1" colspan="1" style="width: 55.4px;" aria-label="Age: activate to sort column ascending">Age</th><th class="sorting" tabindex="0" aria-controls="buttons-datatables" rowspan="1" colspan="1" style="width: 111.4px;" aria-label="Start date: activate to sort column ascending">Start date</th><th class="sorting" tabindex="0" aria-controls="buttons-datatables" rowspan="1" colspan="1" style="width: 78.4px;" aria-label="Salary: activate to sort column ascending">Salary</th></tr>
                        </thead>
                        <tbody>
                            <tr class="odd">
                                <td class="sorting_1">Airi Satou</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>33</td>
                                <td>2008/11/28</td>
                                <td>$162,700</td>
                                </tr><tr class="even">
                                    <td class="sorting_1">Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td>66</td>
                                    <td>2009/01/12</td>
                                    <td>$86,000</td>
                                </tr>
                                <tr class="odd">
                                    <td class="sorting_1">Bradley Greer</td>
                                    <td>Software Engineer</td>
                                    <td>London</td>
                                    <td>41</td>
                                    <td>2012/10/13</td>
                                    <td>$132,000</td>
                                </tr><tr class="even">
                                                <td class="sorting_1">Brielle Williamson</td>
                                                <td>Integration Specialist</td>
                                                <td>New York</td>
                                                <td>61</td>
                                                <td>2012/12/02</td>
                                                <td>$372,000</td>
                                            </tr><tr class="odd">
                                                <td class="sorting_1">Caesar Vance</td>
                                                <td>Pre-Sales Support</td>
                                                <td>New York</td>
                                                <td>21</td>
                                                <td>2011/12/12</td>
                                                <td>$106,450</td>
                                            </tr><tr class="even">
                                                <td class="sorting_1">Cedric Kelly</td>
                                                <td>Senior Javascript Developer</td>
                                                <td>Edinburgh</td>
                                                <td>22</td>
                                                <td>2012/03/29</td>
                                                <td>$433,060</td>
                                            </tr><tr class="odd">
                                                <td class="sorting_1">Charde Marshall</td>
                                                <td>Regional Director</td>
                                                <td>San Francisco</td>
                                                <td>36</td>
                                                <td>2008/10/16</td>
                                                <td>$470,600</td>
                                            </tr><tr class="even">
                                                <td class="sorting_1">Colleen Hurst</td>
                                                <td>Javascript Developer</td>
                                                <td>San Francisco</td>
                                                <td>39</td>
                                                <td>2009/09/15</td>
                                                <td>$205,500</td>
                                            </tr><tr class="odd">
                                                <td class="sorting_1">Dai Rios</td>
                                                <td>Personnel Lead</td>
                                                <td>Edinburgh</td>
                                                <td>35</td>
                                                <td>2012/09/26</td>
                                                <td>$217,500</td>
                                            </tr><tr class="even">
                                                <td class="sorting_1">Doris Wilder</td>
                                                <td>Sales Assistant</td>
                                                <td>Sydney</td>
                                                <td>23</td>
                                                <td>2010/09/20</td>
                                                <td>$85,600</td>
                                            </tr></tbody></table><div class="dataTables_info" id="buttons-datatables_info" role="status" aria-live="polite">Showing 1 to 10 of 27 entries</div><div class="dataTables_paginate paging_simple_numbers" id="buttons-datatables_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="buttons-datatables_previous"><a href="#" aria-controls="buttons-datatables" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="buttons-datatables" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="buttons-datatables" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="buttons-datatables" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item next" id="buttons-datatables_next"><a href="#" aria-controls="buttons-datatables" data-dt-idx="4" tabindex="0" class="page-link">Next</a></li></ul></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
</template>
