

    <div class="contents bg-light">
        <div class="container mt-3">
            <h3>Display Balance</h3>
            <hr>
            <div class="row">

            </div>

            <div style="margin-top: 160px;" class="row">

                <div class="col-1">

                </div>

                <div style="background-color: #EBEDEF; border: 2px solid #ff9700; border-radius: 5px; text-align: center; padding: 30px;" class="col-4">
                    <h2>Current Balance</h2>
                    <h3><?php echo number_format($user->balance, '2', '.', ' ') . ' SR'; ?></h3>
                </div>

                <div class="col-2"></div>

                <div style="background-color: #EBEDEF; border: 2px solid #ff9700; border-radius: 5px; text-align: center; padding: 30px;" class="col-4">
                    <h2>Previous Balance</h2>
                    <h3><?php echo number_format($user->prev_balance, '2', '.', ' ') . ' SR'; ?></h3>
                </div>

                <div class="col-1">

                </div>
            </div>

            <div class="row">

            </div>
        </div>
    </div>
    
</body>
</html>