<div>
    <div class="modern-card">
        <div class="modern-card-header">
            <div class="header-content">
                <div>
                    <h1 class="modern-title">فورما چاپکرنێ</h1>
                </div>
                <!-- Selection Controls -->
                <div class="selection-controls">
                    <span class="selection-counter">
                        <strong>{{ count($selectedStudents) }}/8</strong> <span>قوتابی هەڵبژێردرا</span>
                    </span>
                    @if (count($selectedStudents) > 0)
                        <button class="btn btn-sm btn-outline-primary ms-2" wire:click="printSelected"
                            wire:loading.attr="disabled" style="color: white" title="چاپکردنی هەڵبژێردراوان">
                            <i class="bi bi-printer"></i> <span>چاپکردن</span>
                        </button>
                        <button class="btn btn-sm btn-outline-danger ms-2" wire:click="clearSelections">
                            <i class="bi bi-x-circle"></i> <span>پاککردنەوەی هەموو</span>
                        </button>
                    @endif
                    <button class="btn btn-sm btn-outline-primary ms-2" wire:click="selectFirstEight"
                        style="color: white">
                        <i class="bi bi-check2-all"></i> <span>هەڵبژاردنی ٨ یەکەم</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Search and Info -->
        <div class="mb-3" style="margin: 10px 10px 0 10px">
            <div class="input-wrapper">
                <input type="text" class="modern-input" wire:model.live="search"
                    placeholder="گەریان ل ناڤ، موبایل، ناونیشان ،راهێنەری...">
                <div class="input-line"></div>
            </div>
            @if (count($selectedStudents) >= 8)
                <div class="alert alert-warning mt-2 mb-0 p-2">
                    <i class="bi bi-exclamation-triangle"></i>
                    زۆرترین ژمارەی هەڵبژاردن ٨ قوتابیە. دەتوانیت هەڵبژاردنێک بسڕیتەوە یان پاکیان بکەرەوە.
                </div>
            @endif
        </div>

        <!-- Table -->
        <div style="overflow-x: auto; border-radius: var(--radius-md); border: 1px solid var(--border);">
            <table class="table-simple">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" class="form-check-input" wire:model.live="selectAll"
                                @if (count($selectedStudents) >= 8) disabled @endif>
                        </th>
                        <th>#</th>
                        <th class="text-center">ناڤ</th>
                        <th class="text-center">ناونیشان</th>
                        <th class="text-center">موبایل</th>
                        <th class="text-center">ڕاهێنەر</th>
                        <th class="text-center">جورێ ئوتومبێلێ</th>
                        <th class="text-center">فێرکرن</th>
                        <th class="text-center">روژا دەستپێکرنێ</th>
                        <th class="text-center">چالاکی</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($Students as $index => $Student)
                        <tr @if (in_array($Student->id, $selectedStudents)) class="selected-row" @endif>
                            <td>
                                <input type="checkbox" class="form-check-input" wire:model.live="selectedStudents"
                                    value="{{ $Student->id }}" @if (count($selectedStudents) >= 8 && !in_array($Student->id, $selectedStudents)) disabled @endif>
                            </td>
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
                            <td class="align-middle">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <button class="row-btn row-btn-edit" title="گوهرین"
                                        wire:click="edit({{ $Student->id }})">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="row-btn row-btn-delete" title="ژێبرن"
                                        wire:click.prevent="$dispatch('confirmDelete', {id: {{ $Student->id }}})">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center py-4">هیچ قوتابیەک نەدۆزرایەوە</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($Students->hasPages())
            <div class="mt-3">
                {{ $Students->links() }}
            </div>
        @endif
    </div>

    <style>
        .selected-row {
            background-color: rgba(var(--primary-rgb), 0.1) !important;
        }

        .selection-controls {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-left: auto;
        }

        .selection-counter {
            background: var(--light);
            padding: 4px 12px;
            border-radius: var(--radius-sm);
            font-size: 0.9rem;
        }

        .form-check-input {
            cursor: pointer;
            width: 18px;
            height: 18px;
        }

        .form-check-input:disabled {
            cursor: not-allowed;
            opacity: 0.5;
        }

        strong {
            font-size: 25px;
        }

        span {
            font-size: 18px;
        }
    </style>

    <iframe id="printFrame" style="display:none;"></iframe>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('printIframe', ({
                ids
            }) => {

                // Remove old iframe if exists
                const oldIframe = document.getElementById('printFrame');
                if (oldIframe) oldIframe.remove();

                // Create iframe
                const iframe = document.createElement('iframe');
                iframe.id = 'printFrame';
                iframe.style.display = 'none';
                document.body.appendChild(iframe);

                let step = 1; // 1 = FRONT, 2 = BACK

                iframe.onload = () => {
                    setTimeout(() => {
                        iframe.contentWindow.focus();
                        iframe.contentWindow.print();

                        // After FRONT → load BACK
                        if (step === 1) {
                            step = 2;

                            setTimeout(() => {
                                iframe.src =
                                    `/print/selectedstudentsBackPage/${ids}?t=${Date.now()}`;
                            }, 800); // wait for print dialog close
                        }
                    }, 300);
                };

                // Load FRONT first
                iframe.src = `/print/selected-students/${ids}?t=${Date.now()}`;
            });
        });
    </script>






</div>
