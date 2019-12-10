<?php $this->view('layout/header') ?>

<div class="container">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Amount</th>
            <th>Buyer</th>
            <th>Receipt ID</th>
            <th>Items</th>
            <th>Email</th>
            <th>Phone</th>
            <th>City</th>
            <th>IP</th>
            <th>Date</th>
            <th>User</th>
            <th>Note</th>

        </tr>
        </thead>
        <tbody>
        <?php $count = 0; foreach ($sales as $sale){ ?>
            <tr>
                <td><?php echo ++$count ?></td>
                <td><?php echo $sale->amount ?></td>
                <td><?php echo $sale->buyer ?></td>
                <td><?php echo $sale->receipt_id ?></td>
                <td><?php echo implode(', ', json_decode($sale->items)) ?></td>
                <td><?php echo $sale->buyer_email ?></td>
                <td><?php echo $sale->phone ?></td>
                <td><?php echo $sale->city ?></td>
                <td><?php echo $sale->buyer_ip ?></td>
                <td><?php echo $sale->entry_at ?></td>
                <td><?php echo $sale->entry_by ?></td>
                <td><?php echo $sale->note ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<?php $this->view('layout/footer') ?>

