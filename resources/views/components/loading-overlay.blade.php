<div id="loading-overlay" wire:loading wire:target="save, delete, search, filter" style="display:flex !important">
    <div class="loading-pill">
        <div class="loading-ring"></div>
        <span class="loading-text">چاوەڕێ بکە<span class="loading-dots"></span></span>
    </div>
</div>

<style>
    #loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.35);
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
        z-index: 9999;
        display: flex !important;
        align-items: flex-end;
        justify-content: center;
        padding-bottom: 30px;
        animation: fadeIn 0.2s ease;
    }

    .loading-pill {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 150px;
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: 50px;
        padding: 12px 20px;
        box-shadow: var(--stat-shadow);
        animation: slideUp 0.25s cubic-bezier(.4, 0, .2, 1);
    }

    .loading-ring {
        width: 18px;
        height: 18px;
        border: 2.5px solid var(--border);
        border-top-color: var(--primary);
        border-radius: 50%;
        flex-shrink: 0;
        animation: spin 0.75s linear infinite;
    }

    .loading-text {
        font-size: 13px;
        font-weight: 600;
        color: var(--text);
        white-space: nowrap;
    }

    .loading-dots::after {
        content: '';
        animation: dots 1.4s steps(3, end) infinite;
        display: inline-block;
        width: 16px;
        text-align: left;
    }

    @keyframes dots {
        0% {
            content: '';
        }

        33% {
            content: '.';
        }

        66% {
            content: '..';
        }

        100% {
            content: '...';
        }
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(12px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
</div>
