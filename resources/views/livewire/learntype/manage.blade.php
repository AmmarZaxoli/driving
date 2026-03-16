<div>
    <div class="modern-card">



        <div class="section-header mb-4">
            <div>
                <h1 class="section-title-main">
                    فورما جورێ راهێنانێ </h1>
            </div>
            <button class="btn-primary-custom" wire:click="toggleForm">
                @if ($Learntypeadd)
                    گرتنا جورێ راهێنانێ
                    <i class="bi bi-x-lg"></i>
                @else
                    زێدەکرنا جورێ راهێنانێ
                    <i class="bi bi-plus-lg"></i>
                @endif
            </button>
        </div>





        <!-- Add Nationality Form -->
        @if ($Learntypeadd)
            <div class="form-card">
                <form wire:submit.prevent="save">
                    <div class="row g-3">
                        <!-- Name nationality -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nationality" class="form-label">

                                    جورێ راهێنانێ
                                </label>
                                <div class="input-wrapper">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        wire:model="name" placeholder="جورێ راهێنانێ">
                                    <div class="input-line"></div>
                                </div>
                                @error('name')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="text-start mt-3">

                        <button type="submit" class="btn-primary-custom">
                            تۆمارکرن
                        </button>
                    </div>
                </form>
            </div>
        @endif

        <div class="table-card mt-3">

            <div class="table-toolbar">
                <div class="search-box">
                    <i class="bi bi-search"></i>
                    <input type="text" placeholder="لێ گەریان ب جورێ راهێنانێ" wire:model.live="search" />
                </div>

            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th style="width: 80%">جورێ راهێنانێ</th>
                            <th class="text-center">چالاکی</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($learntypes as $learn)
                            <tr>
                                <td style="font-weight: 600; color: var(--primary);">{{ $loop->iteration }}</td>
                                <td class="t-name">{{ $learn->name }}</td>
                                <!-- Actions -->
                                <td class="align-middle">
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <button class="action-btn edit" wire:click="edit({{ $learn->id }})"
                                            title="گوهرین">
                                            <i class="bi bi-pencil"></i>
                                        </button>


                                        <button class="action-btn delete" title="ژێبرن"
                                            wire:click.prevent="$dispatch('confirmDelete',{id:{{ $learn->id }} })">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @if ($learntypes->hasPages())
            <div class="d-flex align-items-center justify-content-between p-3 flex-wrap gap-2"
                style="border-top:1px solid var(--border);">

                <!-- Showing items info -->
                <div style="font-size:13px;color:var(--text-secondary);">
                    عرض {{ $learntypes->firstItem() }}–{{ $learntypes->lastItem() }} من أصل {{ $learntypes->total() }}
                    نوع تعلم
                </div>

                <!-- Pager buttons -->
                <div class="pager d-flex gap-1">
                    <!-- Previous Page -->
                    <button class="pager-btn {{ $learntypes->onFirstPage() ? 'disabled' : '' }}"
                        wire:click.prevent="previousPage" @if ($learntypes->onFirstPage()) disabled @endif>
                        <i class="bi bi-chevron-right"></i>
                    </button>

                    <!-- Page Numbers -->
                    @foreach ($learntypes->getUrlRange(1, $learntypes->lastPage()) as $page => $url)
                        <button class="pager-btn {{ $page == $learntypes->currentPage() ? 'active' : '' }}"
                            wire:click.prevent="gotoPage({{ $page }})">
                            {{ $page }}
                        </button>
                    @endforeach

                    <!-- Next Page -->
                    <button
                        class="pager-btn {{ $learntypes->currentPage() == $learntypes->lastPage() ? 'disabled' : '' }}"
                        wire:click.prevent="nextPage" @if ($learntypes->currentPage() == $learntypes->lastPage()) disabled @endif>
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
                        $wire.dispatch("deleteLearntype", {
                            id: event.id
                        });
                    }
                });
            });
        </script>
    @endscript
</div>
