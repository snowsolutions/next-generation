<div class="top-navigation">
    <?php
    $activeNav = \Illuminate\Support\Facades\Session::get('active_nav');
    ?>
    <a class="navigation-item <?= $activeNav == 'lead.index' ?'active' : 'inactive'?>" href="{{route('lead.index')}}">
        <div class="navigation-item-content">
            Leads
        </div>
    </a>
    <a class="navigation-item <?= $activeNav == 'account.index' ?'active' : 'inactive'?>" href="{{route('account.index')}}">
        <div class="navigation-item-content">
            Accounts
        </div>
    </a>
    <a class="navigation-item <?= $activeNav == 'campaign.index' ?'active' : 'inactive'?>" href="{{route('campaign.index')}}">
        <div class="navigation-item-content">
            Campaigns
        </div>
    </a>
</div>
