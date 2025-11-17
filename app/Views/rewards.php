<?= $this->include('templates/header') ?>
<?= $this->section('main') ?>
<div class="container py-5">

    <!-- Title Section -->
    <h2 class="fw-bold">Rewards Marketplace</h2>
    <p>Redeem your points for exciting rewards • You have <span class="text-warning fw-bold">150 points</span></p>

    <!-- Filters -->
    <div class="mb-4">
        <button class="btn btn-success me-2">All Rewards</button>
        <button class="btn btn-outline-light me-2">Tech</button>
        <button class="btn btn-outline-light me-2">Lifestyle</button>
        <button class="btn btn-outline-light me-2">Food & Beverage</button>
    </div>

    <!-- Rewards Grid -->
    <div class="row g-4">

        <!-- CARD 1 -->
        <div class="col-md-4">
            <div class="reward-card position-relative">
                <div class="tag-point">500 Pts</div>

                <div class="icon-box mb-3">
                    🎧
                </div>

                <h5 class="fw-bold">Wireless Earbuds</h5>
                <p class="mb-1">Premium quality wireless earbuds with noise cancellation</p>
                <p class="text-warning small">Need 350 more points</p>

                <button class="btn btn-disabled-custom w-100" disabled>Not Enough Point</button>
            </div>
        </div>

        <!-- CARD 2 -->
        <div class="col-md-4">
            <div class="reward-card position-relative">
                <div class="tag-point">200 Pts</div>

                <div class="icon-box mb-3">
                    💻
                </div>

                <h5 class="fw-bold">Tech Merch Pack</h5>
                <p class="mb-1">Exclusive SIMAJA t-shirt, stickers, and water bottle</p>
                <p class="text-warning small">Need 50 more points</p>

                <button class="btn btn-disabled-custom w-100" disabled>Not Enough Point</button>
            </div>
        </div>

        <!-- CARD 3 -->
        <div class="col-md-4">
            <div class="reward-card position-relative">
                <div class="tag-point">100 Pts</div>

                <div class="icon-box mb-3">
                    ☕
                </div>

                <h5 class="fw-bold">Coffee Voucher</h5>
                <p class="mb-4">$10 voucher for your favorite coffee shop</p>

                <button class="btn btn-active-custom w-100">Redeem Now</button>
            </div>
        </div>

        <!-- CARD 4 -->
        <div class="col-md-4">
            <div class="reward-card position-relative">
                <div class="tag-point">150 Pts</div>

                <div class="icon-box mb-3">
                    📱
                </div>

                <h5 class="fw-bold">Phone Stand</h5>
                <p class="mb-3">Adjustable aluminum phone stand for your desk</p>

                <button class="btn btn-active-custom w-100">Redeem Now</button>
            </div>
        </div>

        <!-- CARD 5 -->
        <div class="col-md-4">
            <div class="reward-card position-relative">
                <div class="tag-point">300 Pts</div>

                <div class="icon-box mb-3">
                    📘
                </div>

                <h5 class="fw-bold">Premium Course Access</h5>
                <p class="mb-1">1 month access to advanced programming courses</p>
                <p class="text-warning small">Need 150 more points</p>

                <button class="btn btn-disabled-custom w-100" disabled>Not Enough Point</button>
            </div>
        </div>

        <!-- CARD 6 -->
        <div class="col-md-4">
            <div class="reward-card position-relative">
                <div class="tag-point">400 Pts</div>

                <div class="icon-box mb-3">
                    🎁
                </div>

                <h5 class="fw-bold">Gift Card $25</h5>
                <p class="mb-1">Amazon gift card worth $25</p>
                <p class="text-warning small">Need 250 more points</p>

                <button class="btn btn-disabled-custom w-100" disabled>Not Enough Point</button>
            </div>
        </div>

    </div>
</div>

<?= $this->renderSection('main') ?>
<?= $this->include('templates/footer') ?>