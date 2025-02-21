@extends('layouts.app')

@section('styles')
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-group {
            position: relative;
        }

        .form-group i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #007bff;
        }

        .form-control {
            padding-left: 35px;
        }

        .card-header {
            background: linear-gradient(135deg, #f8f19e, #dcf809);
            /* Blue to Purple Gradient */
            color: rgb(78, 51, 251);
            font-size: 25px;
            font-weight: bold;
            text-align: center;
            padding: 15px;
            border-radius: 10px 10px 0 0;
            /* Rounded top corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Adds a shadow effect */
            letter-spacing: 1px;
            /* Improves readability */
            text-transform: uppercase;
            /* Makes it look more professional */
        }

        .btn-primary {
            background: #007bff;
            border: none;
            font-size: 16px;
            padding: 10px 20px;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        .alert-success {
            font-weight: bold;
            text-align: center;
        }

        /* Increase checkbox size */
        .largerCheckbox {
            width: 20px;
            height: 20px;
            cursor: pointer;
            margin-top: 35px;
        }

        .nav-tabs {
            border-bottom: 3px solid #007bff;
            background: linear-gradient(45deg, #a3d4f7, #fb76bf);
            padding: 10px;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
        }

        .nav-tabs .nav-link {
            color: #fff;
            font-weight: bold;
            border-radius: 10px;
            padding: 10px 15px;
            margin: 5px 0;
            text-align: center;
            text-transform: uppercase;
        }

        .nav-tabs .nav-link.active {
            background-color: #ff416c;
            color: #fff;
            border: 2px solid #ff416c;
            box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
        }

        .nav-tabs .nav-link:hover {
            background: rgba(255, 255, 255, 0.2);
            color: #ff416c;
            border: 2px solid #ff416c;
        }

        .tab-content {
            padding: 20px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        }

        .nav-tabs .nav-item {
            flex: 1;

        }

        .nav-tabs .nav-link {
            display: block;
        }

        .nav-tabs .nav-item.col-12 {
            margin-bottom: 10px;
        }

        .nav-tabs .nav-link i {
            color: rgb(29, 5, 108);
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .nav-tabs {
                flex-wrap: wrap;
                overflow-x: auto;
                white-space: nowrap;
            }

            .nav-item {
                flex-grow: 1;
                text-align: center;
            }

            .nav-tabs .nav-link {
                padding: 12px 15px;
                font-size: 14px;
            }
        }

                /* General Styling */
                .form-label {
                    font-weight: bold;
                    font-size: 16px;
                }
                .form-select, .form-control {
                    height: 45px;
                    border-radius: 6px;
                }
                
                /* Sections Styling */
                .seba-section, .beddha-section {
                    margin-top: 20px;
                    padding: 15px;
                    background: #fff;
                    border-radius: 10px;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                }
                .section-title {
                    font-size: 18px;
                    font-weight: bold;
                    display: block;
                    margin-bottom: 10px;
                }
            
                /* Checkbox List */
                .checkbox-list {
                    display: grid;
                    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                    gap: 10px;
                    padding: 10px;
                    background: #f9f9f9;
                    border-radius: 8px;
                    max-height: 200px;
                    overflow-y: auto;
                }
                .form-check-input {
                    transform: scale(1.2);
                    cursor: pointer;
                    margin-right: 5px;
                }
                .form-check-label {
                    font-size: 15px;
                }
            
                /* Button Styling */
                .custom-gradient-btn {
                    background: linear-gradient(135deg, #6a11cb, #2575fc);
                    color: white;
                    font-size: 18px;
                    font-weight: bold;
                    padding: 12px;
                    border-radius: 8px;
                    transition: 0.3s;
                }
                .custom-gradient-btn:hover {
                    background: linear-gradient(135deg, #2575fc, #6a11cb);
                    transform: scale(1.05);
                }

    </style>
@endsection

@section('content')

<!-- Profile Form -->
<div class="row">
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header" style="text-shadow: 2px 1px 3px rgba(0,0,0,0.4)">🛕Pratihari
                Seba</div>
            <ul class="nav nav-tabs flex-column flex-sm-row mt-2" role="tablist">

                <li class="nav-item col-12 col-sm-auto">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="{{ route('admin.pratihariProfile') }}"
                        role="tab" aria-controls="profile" aria-selected="true">
                        <i class="fas fa-user"></i> Profile
                    </a>
                </li>
                <li class="nav-item col-12 col-sm-auto">
                    <a class="nav-link" id="family-tab" data-toggle="tab" href="{{ route('admin.pratihariFamily') }}"
                        role="tab" aria-controls="family" aria-selected="true">
                        <i class="fas fa-users"></i> Family
                    </a>
                </li>

                <li class="nav-item col-12 col-sm-auto">
                    <a class="nav-link" id="id-card-tab" data-toggle="tab" href="{{ route('admin.pratihariIdcard') }}"
                        role="tab" aria-controls="id-card" aria-selected="false">
                        <i class="fas fa-id-card"></i> ID Card
                    </a>
                </li>
                <li class="nav-item col-12 col-sm-auto">
                    <a class="nav-link" id="address-tab" data-toggle="tab" href="{{ route('admin.pratihariAddress') }}"
                        role="tab" aria-controls="address" aria-selected="false">
                        <i class="fas fa-map-marker-alt"></i> Address
                    </a>
                </li>
                <li class="nav-item col-12 col-sm-auto">
                    <a class="nav-link" id="occupation-tab" data-toggle="tab"
                        href="{{ route('admin.pratihariOccupation') }}" role="tab" aria-controls="occupation"
                        aria-selected="false">
                        <i class="fas fa-briefcase"></i> Occupation
                    </a>
                </li>

                <li class="nav-item col-12 col-sm-auto">
                    <a class="nav-link" id="seba-details-tab" style="background-color: rgb(49, 49, 181);color: white"
                        data-toggle="tab" href="{{ route('admin.pratihariSeba') }}" role="tab"
                        aria-controls="seba-details" aria-selected="false">
                        <i class="fas fa-cogs" style="color: white"></i> Seba
                    </a>
                </li>

                <li class="nav-item col-12 col-sm-auto">
                    <a class="nav-link" id="social-media-tab" data-toggle="tab"
                        href="{{ route('admin.pratihariSocialMedia') }}" role="tab" aria-controls="social-media"
                        aria-selected="false">
                        <i class="fas fa-share-alt" style="margin-right: 2px"></i>Social Media
                    </a>
                </li>
            </ul>

            <div class="card-body">
                <form action="{{ route('admin.pratihari-seba.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="pratihari_id" value="{{ request('pratihari_id') }}">
            
                    <!-- Nijoga Selection -->
                    <div class="form-group">
                        <label for="nijoga_type" class="form-label">🛕 Nijoga Category</label>
                        <select class="form-select" id="nijoga_type" name="nijoga_type" required>
                            <option value="">Select Nijoga</option>
                            @foreach ($nijogas as $nijoga)
                                <option value="{{ $nijoga->id }}">{{ $nijoga->nijoga_name }}</option>
                            @endforeach
                        </select>
                    </div>
            
                    <!-- Seba and Beddha Sections (Initially Hidden) -->
                    <div id="seba_beddha_section" class="hidden">
                        <!-- Available Seba List -->
                        <div class="seba-section">
                            <label class="section-title">✅ Available Sebas</label>
                            <div class="checkbox-list" id="seba_list">
                                <!-- Seba checkboxes dynamically added -->
                            </div>
                        </div>
            
                        <!-- Available Beddha List -->
                        <div class="beddha-section">
                            <label class="section-title">📜 Beddha List</label>
                            <div class="checkbox-list" id="beddha_list">
                                <!-- Beddha checkboxes dynamically added -->
                            </div>
                        </div>
                    </div>
            
                    <!-- Submit Button -->
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-lg mt-3 w-50 custom-gradient-btn" style="color: white">
                            <i class="fa fa-save"></i> Submit
                        </button>
                    </div>
                </form>
            </div>
            
                      

        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: "{{ session('error') }}",
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK'
            });
        @endif
    });
</script>

<script>
    document.getElementById('nijoga_type').addEventListener('change', function() {
        let nijogaId = this.value;
        let sebaList = document.getElementById('seba_list');
        let beddhaList = document.getElementById('beddha_list');
        let sebaBeddhaSection = document.getElementById('seba_beddha_section');
    
        sebaList.innerHTML = '';
        beddhaList.innerHTML = '';
        sebaBeddhaSection.classList.add('d-none');
    
        if (nijogaId) {
            fetch(`/admin/get-seba/${nijogaId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        sebaBeddhaSection.classList.remove('d-none');
                    }
                    data.forEach(seba => {
                        let checkbox = `
                            <div class="form-check me-3">
                                <input class="form-check-input seba-checkbox" type="checkbox" name="seba_id[]" value="${seba.id}" id="seba_${seba.id}" data-seba-id="${seba.id}">
                                <label class="form-check-label" for="seba_${seba.id}">${seba.seba_name}</label>
                            </div>`;
                        sebaList.innerHTML += checkbox;
                    });
    
                    document.querySelectorAll('.seba-checkbox').forEach(checkbox => {
                        checkbox.addEventListener('change', function() {
                            let sebaId = this.dataset.sebaId;
                            let beddhaGroup = document.getElementById(`beddha_group_${sebaId}`);
    
                            if (this.checked) {
                                fetch(`/admin/get-beddha/${sebaId}`)
                                    .then(response => response.json())
                                    .then(data => {
                                        if (!beddhaGroup) {
                                            let beddhaHtml = `<div class="beddha-group" id="beddha_group_${sebaId}">
                                                <strong>${this.nextElementSibling.innerText}:</strong>
                                                <div class="d-flex flex-wrap gap-2 mt-2">`;
                                            data.forEach(beddha => {
                                                beddhaHtml += `
                                                    <div class="form-check me-3">
                                                        <input class="form-check-input" type="checkbox" name="beddha_id[${sebaId}][]" value="${beddha.id}" id="beddha_${sebaId}_${beddha.id}">
                                                        <label class="form-check-label" for="beddha_${sebaId}_${beddha.id}">${beddha.beddha_name}</label>
                                                    </div>`;
                                            });
                                            beddhaHtml += `</div></div>`;
                                            beddhaList.innerHTML += beddhaHtml;
                                        }
                                    });
                            } else {
                                if (beddhaGroup) {
                                    beddhaGroup.remove();
                                }
                            }
                        });
                    });
                });
        }
    });
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
