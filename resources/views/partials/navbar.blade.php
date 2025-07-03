<nav style="background: rgba(255,255,255,0.95); padding: 15px 20px; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
    <div style="display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto;">
        <div style="display: flex; align-items: center; gap: 20px;">
            <a href="{{ route('coffees.index') }}" style="color: #c59d5f; text-decoration: none; font-weight: 600; font-size: 1.1rem;">
                <i class="fa fa-home"></i> Home
            </a>
            <a href="{{ route('orders.create') }}" style="color: #333; text-decoration: none; font-weight: 500;">
                <i class="fa fa-plus"></i> Pesan Kopi
            </a>
            <a href="{{ route('orders.history') }}" style="color: #333; text-decoration: none; font-weight: 500;">
                <i class="fa fa-history"></i> Riwayat Pesanan
            </a>
        </div>
        <div style="display: flex; align-items: center; gap: 15px;">
            @if(session('user_id'))
                <span style="color: #666; font-size: 0.9rem;">
                    <i class="fa fa-user"></i> {{ session('username', 'User') }}
                </span>
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" style="background: #dc3545; color: white; border: none; padding: 8px 15px; border-radius: 5px; cursor: pointer; font-size: 0.9rem;">
                        <i class="fa fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" style="color: #333; text-decoration: none; font-weight: 500;">
                    <i class="fa fa-sign-in-alt"></i> Login
                </a>
                <a href="{{ route('register') }}" style="color: #333; text-decoration: none; font-weight: 500;">
                    <i class="fa fa-user-plus"></i> Register
                </a>
            @endif
        </div>
    </div>
</nav>
<hr>