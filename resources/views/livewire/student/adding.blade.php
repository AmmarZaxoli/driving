<div>

    <!-- Modern Card Design -->
    <div class="modern-card">
        <!-- Animated Header -->
        <div class="section-header mb-4">
            <div>
                <h1 class="section-title-main">فورما قوتابی</h1>
            </div>

            <button class="btn-primary-custom" wire:click="toggleForm">
                @if ($Studentadd)
                    گرتنا فورما فـێـرخــازی
                    <i class="bi bi-x-lg"></i>
                @else
                    زێدەکرنا فـێـرخــازی
                    <i class="bi bi-plus-lg"></i>
                @endif
            </button>

        </div>



        @if ($Studentadd)

            <div class="form-card">
                <!-- Form -->
                <form wire:submit.prevent="submit">
                    <div class="row g-3">
                        <!-- Name -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="form-label">
                                    <i class="bi bi-person label-icon"></i>
                                    ناڤێ فـێـرخــازی
                                </label>
                                <div class="input-wrapper">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        autocomplete="off" autofocus id="name" wire:model.defer="name"
                                        placeholder="ناڤێ فـێـرخــازی">
                                    <div class="input-line"></div>
                                </div>
                                @error('name')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Mother Name -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mother_name" class="form-label">
                                    <i class="bi bi-gender-female label-icon"></i>
                                    ناڤێ دایکێ فـێـرخــازی
                                </label>
                                <div class="input-wrapper">
                                    <input type="text"
                                        class="form-control @error('mother_name') is-invalid @enderror" id="mother_name"
                                        autocomplete="off" wire:model.defer="mother_name"
                                        placeholder="ناڤێ دایکێ فـێـرخــازی">
                                    <div class="input-line"></div>
                                </div>
                                @error('mother_name')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Birthday -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="birthday" class="form-label">
                                    <i class="bi bi-calendar label-icon"></i>
                                    سالا ژ دایکبونێ
                                </label>
                                <div class="input-wrapper">
                                    <input type="date" class="form-control @error('birthday') is-invalid @enderror"
                                        id="birthday" wire:model.defer="birthday">
                                    <div class="input-line"></div>
                                </div>
                                @error('birthday')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="location" class="form-label">
                                    <i class="bi bi-geo-alt label-icon"></i>
                                    ناڤو نیشان
                                </label>
                                <div class="input-wrapper">
                                    <input type="text" class="form-control @error('location') is-invalid @enderror"
                                        autocomplete="off" id="location" wire:model.defer="location"
                                        placeholder="City, Country">
                                    <div class="input-line"></div>
                                </div>
                                @error('location')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Mobile Number -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile_number" class="form-label">
                                    <i class="bi bi-phone label-icon"></i>
                                    ژمارا موبایلێ
                                </label>
                                <div class="input-wrapper">
                                    <input type="tel"
                                        class="form-control @error('mobile_number') is-invalid @enderror"
                                        autocomplete="off" id="mobile_number" wire:model.defer="mobile_number"
                                        placeholder="0750 -------">
                                    <div class="input-line"></div>
                                </div>
                                @error('mobile_number')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Date Join -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_join" class="form-label">
                                    <i class="bi bi-calendar label-icon"></i>
                                    ریێکەفتی پەیوەندیکرنێ
                                </label>
                                <div class="input-wrapper">
                                    <input type="date" class="form-control @error('date_join') is-invalid @enderror"
                                        id="date_join" wire:model.defer="date_join">
                                    <div class="input-line"></div>
                                </div>
                                @error('date_join')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Date DR Number -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_dr_number" class="form-label">
                                    <i class="bi bi-calendar label-icon"></i>
                                    ریێکەفتی لێنرینا پزیشکی
                                </label>
                                <div class="input-wrapper">
                                    <input type="date"
                                        class="form-control @error('date_dr_number') is-invalid @enderror"
                                        autocomplete="off" id="date_dr_number" wire:model.defer="date_dr_number"
                                        placeholder="DR-123456">
                                    <div class="input-line"></div>
                                </div>
                                @error('date_dr_number')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Invoice -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="invoice" class="form-label">
                                    <i class="bi bi-file-text label-icon"></i>
                                    ژمارا پسولێ
                                </label>
                                <div class="input-wrapper">
                                    <input type="text" class="form-control @error('invoice') is-invalid @enderror"
                                        autocomplete="off" id="invoice" wire:model.defer="invoice"
                                        placeholder="INV-2024-001">
                                    <div class="input-line"></div>
                                </div>
                                @error('invoice')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Nationality Select Box -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nationality" class="form-label">
                                    <i class="bi bi-globe label-icon"></i>
                                    رەگەزنامە
                                </label>
                                <div class="input-wrapper">
                                    <select class="form-control @error('nationality') is-invalid @enderror"
                                        id="nationality" wire:model.defer="nationality">
                                        <option value="">— اختر الجنسية —</option>
                                        @foreach ($nationalities as $value)
                                            <option value="{{ $value->id }}">
                                                {{ $value->nationality }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="input-line"></div>
                                </div>

                                @error('nationality')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Coach name -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="coach" class="form-label">
                                    <i class="bi bi-person label-icon"></i>
                                    ناڤێ راهێنەری
                                </label>
                                <div class="input-wrapper">
                                    <select class="form-control @error('coach') is-invalid @enderror" id="coach"
                                        wire:model.defer="coach" dir="rtl">
                                        <option value="">— هەڵبژێرە —</option>
                                        @foreach ($coachs as $coachItem)
                                            <option value="{{ $coachItem->id }}">
                                                {{ $coachItem->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <div class="input-line"></div>
                                </div>

                                @error('coach')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <!-- Number Car -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="number_car" class="form-label">
                                    <i class="bi bi-car-front label-icon"></i>
                                    ژمارا ئوتومبێلێ
                                </label>
                                <div class="input-wrapper">
                                    <input type="text"
                                        class="form-control @error('number_car') is-invalid @enderror"
                                        id="number_car" autocomplete="off" wire:model.defer="number_car"
                                        placeholder="A-1234">
                                    <div class="input-line"></div>
                                </div>
                                @error('number_car')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Car Type Select Box -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="typecar" class="form-label">
                                    <i class="bi bi-car-front label-icon"></i>
                                    جورێ ئوتومبێلێ
                                </label>
                                <div class="input-wrapper">
                                    <select class="form-control @error('typecar') is-invalid @enderror"
                                        id="typecar" wire:model.defer="typecar">
                                        <option value="">— هەڵبژێرە —</option>
                                        <option value="0">ئوتوماتیک</option>
                                        <option value="1">عادی</option>
                                    </select>
                                    <div class="input-line"></div>
                                </div>
                                @error('typecar')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>

                        <!-- Data Start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="data_start" class="form-label">
                                    <i class="bi bi-calendar label-icon"></i>
                                    روژا دەست پێکرنێ
                                </label>
                                <div class="input-wrapper">
                                    <input type="date"
                                        class="form-control @error('data_start') is-invalid @enderror"
                                        id="data_start" wire:model.live="data_start">
                                    <div class="input-line"></div>
                                </div>
                                @error('data_start')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Learn -->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="learn" class="form-label">
                                    <i class="bi bi-book label-icon"></i>
                                    فێرکرن
                                </label>

                                <div class="input-wrapper">
                                    <select id="learn" class="form-control @error('learn') is-invalid @enderror"
                                        wire:model.live="learn">
                                        <option value="">— هەڵبژێرە —</option>
                                        <option value="0">فێرکرن</option>
                                        <option value="1">فێرکرن و وانە</option>
                                    </select>
                                    <div class="input-line"></div>
                                </div>

                                @error('learn')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>


                        <!-- Time -->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="time" class="form-label">
                                    <i class="bi bi-clock label-icon"></i>
                                    کات
                                </label>

                                <div class="input-wrapper">
                                    <input type="time" id="time"
                                        class="form-control @error('time') is-invalid @enderror"
                                        wire:model.live="time">
                                    <div class="input-line"></div>
                                </div>

                                @error('time')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        @if ($learn == 0)
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="time2" class="form-label">
                                        <i class="bi bi-clock label-icon"></i>
                                        کات
                                    </label>

                                    <div class="input-wrapper">
                                        <input type="time" id="time2"
                                            class="form-control @error('time2') is-invalid @enderror"
                                            wire:model.live="time2"
                                            value="{{ old('time2', isset($student) ? \Carbon\Carbon::parse($student->time2)->format('H:i') : '') }}">
                                        <div class="input-line"></div>
                                    </div>

                                    @error('time2')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="form-label">روژێن فێرکرنێ</label>
                                    <input type="text" class="form-control" wire:model="dayoflearn" readonly>
                                    @if ($errorMessage)
                                        <div class="text-danger mt-1">{{ $errorMessage }}</div>
                                    @endif
                                </div>
                            </div>
                        @endif


                    </div>

                    <!-- Action Buttons -->

                    <div class="text-start mt-3">

                        <button type="submit" class="btn-primary-custom" wire:loading.attr="disabled">
                            <span>تۆمارکردن</span>
                            <i class="bi bi-plus-lg"></i>
                        </button>

                        <button type="button" class="btn-clear-custom" wire:click="resetForm">
                            <span>پاقـژکـــرن</span>
                            <i class="bi bi-clear-lg"></i>
                        </button>
                    </div>

                </form>


            </div>
        @endif

        <div class="table-card mt-3">
            <div class="table-toolbar">
                <div class="search-box">
                    <i class="bi bi-search"></i>
                    <input type="text" wire:model.live="search"
                        placeholder="گەریان ل ناڤ، موبایل، ناونیشان ،راهێنەری...">

                </div>
            </div>
            <div class="table-responsive">

                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-center">ناڤ</th>
                            <th class="text-center">ناونیشان</th>
                            <th class="text-center">موبایل</th>
                            <th class="text-center">ڕاهێنەر</th>
                            <th class="text-center"> جورێ ئوتومبێلێ</th>
                            <th class="text-center">فێرکرن</th>
                            <th class="text-center">روژا دەستپێکرنێ</th>
                            <th class="text-center">چالاکی</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($Students as $index => $Student)
                            <tr>
                                <td style="font-weight:600; color:var(--primary);">
                                    {{ $index + 1 }}
                                </td>

                                <td class="text-center">{{ $Student->name ?? '-' }}</td>
                                <td class="text-center">{{ $Student->location ?? '-' }}</td>
                                <td class="text-center">{{ $Student->mobile_number ?? '-' }}</td>
                                <td class="text-center">{{ $Student->coach->name ?? '-' }}</td>
                                <td class="text-center fw-bold">
                                    {{ $Student->typecar == 0 ? 'ئوتوماتیک' : ($Student->typecar == 1 ? 'عادی' : '-') }}
                                </td>
                                <td class="text-center fw-bold">
                                    {{ $Student->learn == 0 ? 'فێرکرن' : ($Student->learn == 1 ? 'فێرکرن و وانە' : '-') }}
                                </td>
                                <td class="text-center">{{ $Student->data_start ?? '-' }}</td>

                                <!-- Actions -->
                                <td class="align-middle">
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <button class="action-btn edit" title="گوهرین"
                                            wire:click="edit({{ $Student->id }})">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <button class="action-btn delete" title="ژێبرن"
                                            wire:click.prevent="$dispatch('confirmDelete', {id: {{ $Student->id }}})">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                        <!-- Print -->
                                        <button class="action-btn print" title="پرێنت"
                                            onclick="printStudent({{ $Student->id }})">

                                            <i class="bi bi-printer"></i>
                                        </button>



                                    </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                {{-- <iframe id="printFrame" style="display:none;"></iframe> --}}
            </div>

            <!-- Pagination -->
            @if ($Students->hasPages())
                <div class="mt-3">
                    {{ $Students->links() }}
                </div>
            @endif
        </div>

        <div class="print-options">
            <label class="custom-checkbox">
                <input type="checkbox" id="printTemplate1">
                <span class="checkmark"><i class="fas fa-check"></i></span>
                <span class="label-text">فورما قوتابی</span>
            </label>

            <label class="custom-checkbox">
                <input type="checkbox" id="printTemplate2">
                <span class="checkmark"><i class="fas fa-check"></i></span>
                <span class="label-text">فورما قوتابی بو ریڤەبەریێ</span>
            </label>

            <label class="custom-checkbox">
                <input type="checkbox" id="printTemplate3">
                <span class="checkmark"><i class="fas fa-check"></i></span>
                <span class="label-text">فورما وانان و فێرکرنێ</span>
            </label>

            <label class="custom-checkbox">
                <input type="checkbox" id="printTemplate4">
                <span class="checkmark"><i class="fas fa-check"></i></span>
                <span class="label-text">payment</span>
            </label>
        </div>



        <div wire:loading wire:target="submit">
    @include('components.loading-overlay')
</div>

    </div>




    <script>
        function printStudent(studentId) {
            const print1 = document.getElementById('printTemplate1').checked;
            const print2 = document.getElementById('printTemplate2').checked;
            const print3 = document.getElementById('printTemplate3').checked;
            const print4 = document.getElementById('printTemplate4').checked;

            if (!print1 && !print2 && !print3 && !print4) {
                alert('Select at least one template to print.');
                return;
            }

            let url = '';

            if (print1 && print2 && print3 && print4) {
                url = '/students/print-combined/' + studentId;
            } else if (print1) {
                url = '/students/print/' + studentId;
            } else if (print2) {
                url = '/students/print_mror/' + studentId;
            } else if (print3) {
                url = '/students/print_time/' + studentId;
            } else if (print4) {
                url = '/students/print_payment/' + studentId;
            }

            const iframe = document.createElement('iframe');
            iframe.style.display = 'none';
            iframe.src = url;
            document.body.appendChild(iframe);

            iframe.onload = () => {
                iframe.contentWindow.print();
                setTimeout(() => iframe.remove(), 500);
            };
        }
    </script>






    @script
        <script>
            $wire.on("confirmDelete", (event) => {
                Swal.fire({
                    title: "یــێ پشــت راستی؟",
                    text: "دووبـارە نـەشـێ بــزڤـریــنی!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "بـەلـێ!",
                    cancelButtonText: "نەخێر",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $wire.dispatch("deleteStudent", {
                            id: event.id
                        });
                    }
                });
            });
        </script>
    @endscript

</div>
