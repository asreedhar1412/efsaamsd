@extends('app')
@section('content')
    <h1>Customer </h1>

    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Name</td>
                <td><?php echo ($customer['name']); ?></td>
            </tr>
            <tr>
                <td>Cust Number</td>
                <td><?php echo ($customer['cust_number']); ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo ($customer['address']); ?></td>
            </tr>
            <tr>
                <td>City </td>
                <td><?php echo ($customer['city']); ?></td>
            </tr>
            <tr>
                <td>State</td>
                <td><?php echo ($customer['state']); ?></td>
            </tr>
            <tr>
                <td>Zip </td>
                <td><?php echo ($customer['zip']); ?></td>
            </tr>
            <tr>
                <td>Home Phone</td>
                <td><?php echo ($customer['home_phone']); ?></td>
            </tr>
            <tr>
                <td>Cell Phone</td>
                <td><?php echo ($customer['cell_phone']); ?></td>
            </tr>


            </tbody>
        </table>
    </div>
    <?php
    $stocks_total = 0;
    ?>
    <h1>Stocks</h1>
        <div class="container">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr class="bg-info">
                    <th>Symbol</th>
                    <th>Stock Name</th>
                    <th>No. of Shares</th>
                    <th>Purchase Price</th>
                    <th>Purchase Date</th>
                    <th>Original Value</th>
                </tr>
                </thead>
                <tbody>
             @foreach($customer->stocks as $stocks)
                <tr>
                    <td>{{ $stocks['symbol'] }}</td>
                    <td>{{ $stocks['name'] }}</td>
                    <td>{{ $stocks['shares'] }}</td>
                    <td>{{ $stocks['purchase_price'] }}</td>
                    <td>{{ $stocks['purchased'] }}</td>
                    <td>{{ $stocks['original_value'] }}
                        <?php
                        $stocks_total = $stocks_total + $stocks['original_value']?></td>

                </tr>

            @endforeach
                </tbody>
            </table>
                <h4>Total Of Initial Stock Portfolio : <?php echo '$'."$stocks_total" ?> </h4>
        </div>
    <br>
    <?php
    $sum_investment_initial = 0;
    ?>
    <?php
    $sum_investment_current = 0;
    ?>
    <div class="container">
        <h2>Investments </h2>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th>Category </th>
                <th>Description</th>
                <th>Acquired Value</th>
                <th>Acquired Date</th>
                <th>Recent Value</th>
                <th>Recent Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customer->investments as $investment)
                <tr>
                    <td>{{ $investment->category }}</td>
                    <td>{{ $investment->description }}</td>
                    <td>{{ $investment->acquired_value }}
                        <?php $sum_investment_initial = $sum_investment_initial + $investment['acquired_value'] ?>
                    </td>
                    <td>{{ $investment->acquired_date }}</td>
                    <td>{{ $investment->recent_value }}
                        <?php
                        $sum_investment_current = $sum_investment_current + $investment['recent_value']
                        ?>
                    </td>
                    <td>{{ $investment->recent_date }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <h4> Total of Initial Investment Portfolio = <?php echo '$'."$sum_investment_initial" ?></h4>
        <h4> Total of Current Investment Portfolio = <?php echo '$'."$sum_investment_current" ?></h4>
        <?php
        $initial_portfolio_value = 0;
        $current_portfolio_value = 0;
        ?>
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <h4><b>Summary of Portfolio</b></h4>
            <tr class="bg-info">
            <tr>
                <td>Total of Initial Portfolio Value :</td>
                <?php $initial_portfolio_value = $stocks_total + $sum_investment_initial ?>
                <td><?php echo '$'."$initial_portfolio_value" ?></td>
            </tr>
            <tr>
                <td>Total of Current Portfolio :</td>
                <?php $current_portfolio_value = $stocks_total + $sum_investment_current ?>
                <td><?php echo '$'."$current_portfolio_value" ?></td>
            </tr>
            </tbody>
        </table>
    </div>
@stop
