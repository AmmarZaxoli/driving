<div>
    <div class="section-header mb-4">
        <div>
            <h1 class="section-title-main">
                فورما ماموستای </h1>
        </div>
        <button class="btn-primary-custom" wire:click="toggleForm">
            @if ($Techeradd)
                گرتنا فورما ماموستای
                <i class="bi bi-x-lg"></i>
            @else
                زێدەکرنا فورما ماموستای
                <i class="bi bi-plus-lg"></i>
            @endif
        </button>
    </div>

    @if ($Techeradd)
        <div class="form-card">
            <form wire:submit.prevent="save">
                <div class="row g-3">
                    <!-- Name nationality -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-label">

                                ناڤ
                            </label>
                            <div class="input-wrapper">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" autocomplete="off"
                                    autofocus wire:model="name" placeholder="ناڤ">
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
                                <input type="password" class="form-control @error('password') is-invalid @enderror" autocomplete="off"
                                    wire:model.defer="password">
                                <div class="input-line"></div>
                            </div>
                            @error('password')
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
        </div>
        </form>
    @endif

    <!-- Nationalities Table -->
    <div class="table-card mt-3">

        <div class="table-toolbar">
            <div class="search-box">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Search..." wire:model.live.debounce.500ms="search">
            </div>

        </div>
        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th style="width: 80%">رەگەز نامە</th>
                        <th class="text-center">چالاکی</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($techers as $techer)
                        <tr>
                            <td class="text-center" style="font-weight: 600; color: var(--primary);">{{ $loop->iteration }}</td>
                            <td class="t-name">{{ $techer->name }}</td>
                            <!-- Actions -->
                            <td class="align-middle">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <button class="action-btn edit" wire:click="edit({{ $techer->id }})"
                                        title="گوهرین">
                                        <i class="bi bi-pencil"></i>
                                    </button>



                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    @if ($techers->hasPages())
        <div class="d-flex align-items-center justify-content-between p-3 flex-wrap gap-2"
            style="border-top:1px solid var(--border);">

            <!-- Showing items info -->
            <div style="font-size:13px;color:var(--text-secondary);">
                عرض {{ $techers->firstItem() }}–{{ $techers->lastItem() }} من أصل
                {{ $techers->total() }} جنسية
            </div>

            <!-- Pager buttons -->
            <div class="pager d-flex gap-1">
                <!-- Previous Page -->
                <button class="pager-btn {{ $techers->onFirstPage() ? 'disabled' : '' }}"
                    wire:click.prevent="previousPage" @if ($techers->onFirstPage()) disabled @endif>
                    <i class="bi bi-chevron-right"></i>
                </button>

                <!-- Page Numbers -->
                @foreach ($techers->getUrlRange(1, $techers->lastPage()) as $page => $url)
                    <button class="pager-btn {{ $page == $techers->currentPage() ? 'active' : '' }}"
                        wire:click.prevent="gotoPage({{ $page }})">
                        {{ $page }}
                    </button>
                @endforeach

                <!-- Next Page -->
                <button class="pager-btn {{ $techers->currentPage() == $techers->lastPage() ? 'disabled' : '' }}"
                    wire:click.prevent="nextPage" @if ($techers->currentPage() == $techers->lastPage()) disabled @endif>
                    <i class="bi bi-chevron-left"></i>
                </button>
            </div>
        </div>
    @endif
</div>

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
                    $wire.dispatch("deletenationality", {
                        id: event.id
                    });
                }
            });
        });


        
    </script>
@endscript


</div>
