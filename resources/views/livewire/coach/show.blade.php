<div>

    <div class="section-header mb-4">
        <div>
            <h1 class="section-title-main">
                فورما قوتابی
            </h1>
        </div>
        <button class="btn-primary-custom" wire:click="toggleForm">
            @if ($coachAdd)
                گرتنا فورما راهێنەری
                <i class="bi bi-x-lg"></i>
            @else
                زێدەکرنا راهێنەری
                <i class="bi bi-plus-lg"></i>
            @endif
        </button>
    </div>



    @if ($coachAdd)
        <div class="form-card">
            <form wire:submit.prevent="save">
                <div class="row g-3">

                    <!-- Name Cosch-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">ناڤێ راهێنەری</label>
                            <div class="input-wrapper">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    wire:model.defer="name" autocomplete="off">
                                <div class="input-line"></div>
                            </div>
                            @error('name')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">ژمارا نهێنی</label>
                            <div class="input-wrapper">
                                <input type="password1" class="form-control @error('password1') is-invalid @enderror"
                                    wire:model.defer="password1">
                                <div class="input-line"></div>
                            </div>
                            @error('password1')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Mobile -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">ژمارا موبایلێ</label>
                            <input type="text" class="form-control" wire:model.defer="mobile">
                        </div>
                    </div>

                    <!-- Number ID -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">ژمارەی ناسنامێ</label>
                            <input type="text" class="form-control" wire:model.defer="numberid">
                        </div>
                    </div>

                    <!-- Expiry -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">مێژویا بسەرڤە چوون</label>
                            <input type="date" class="form-control" wire:model.defer="datenumberidexpiry">
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">ناڤ و نیشان</label>
                            <textarea class="form-control" rows="3" wire:model.defer="address"></textarea>
                        </div>
                    </div>

                </div>

                <div class="text-start mt-3">

                    <button type="submit" class="btn-primary-custom">
                        {{ $isEdit ? 'گوهرینا راهێنەری' : 'زێدەکرنا راهێنەری' }}
                    </button>


                </div>
            </form>
        </div>
    @endif

    <!-- Simple Table -->
    <div class="table-card mt-3">

        <div class="table-toolbar">
            <div class="search-box">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Search of Coach ..." wire:model.live="search" />
            </div>

        </div>


        <div class="table-responsive">

            <table class="custom-table" id="usersTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="text-center">ناڤ</th>
                        <th class="text-center">ژمارا موبایلێ</th>
                        <th class="text-center">ژمارا ناسنامێ</th>
                        <th class="text-center">سەرڤە چوون</th>
                        <th class="text-center">ناڤ و نیشان</th>
                        <th class="text-center">چالاکی</th>
                    </tr>
                </thead>
                <tbody d="tableBody">
                    @forelse ($coaches as $index => $coach)
                        <tr>
                            <td style="font-weight:600; color:var(--primary);">
                                {{ $index + 1 }}
                            </td>

                            <td class="text-center t-name">
                                {{ $coach->name }}
                            </td>

                            <td class="text-center">
                                {{ $coach->mobile ?? '-' }}
                            </td>

                            <td class="text-center">
                                {{ $coach->numberid ?? '-' }}
                            </td>

                            <td class="text-center">
                                <span class="status status-active">
                                    {{ $coach->datenumberidexpiry ?? '-' }}
                                </span>
                            </td>

                            <td class="text-center">
                                {{ $coach->address ?? '-' }}
                            </td>

                            <!-- Actions -->
                            <td class="align-middle">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <button class="action-btn edit" title="گوهرین"
                                        wire:click="edit({{ $coach->id }})">
                                        <i class="bi bi-pencil"></i>
                                    </button>




                                    <button class="action-btn delete" title="ژێبرن"
                                        wire:click.prevent="$dispatch('confirmDelete',{id:{{ $coach->id }} })">
                                        <i class="bi bi-trash"></i>
                                    </button>



                                </div>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if ($coaches->hasPages())
        <div class="mt-3">
            {{ $coaches->links() }}
        </div>
    @endif


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
                        $wire.dispatch("deleteCoach", {
                            id: event.id
                        });
                    }
                });
            });
        </script>
    @endscript

</div>
