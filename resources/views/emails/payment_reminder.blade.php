<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Confirmation</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f5f5f7;
    }
    
    .gradient-border {
      position: relative;
      border-radius: 1rem;
      background: linear-gradient(to right, #0f172a, #1e293b);
    }
    
    .gradient-border::before {
      content: "";
      position: absolute;
      top: -2px;
      left: -2px;
      right: -2px;
      bottom: -2px;
      background: linear-gradient(45deg, #3b82f6, #8b5cf6, #ec4899);
      z-index: -1;
      border-radius: 1.1rem;
      opacity: 0.7;
    }
    
    .glass-effect {
      backdrop-filter: blur(10px);
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .logo-glow {
      filter: drop-shadow(0 0 8px rgba(139, 92, 246, 0.5));
    }
  </style>
</head>
<body class="bg-gradient-to-br from-slate-900 to-slate-800 min-h-screen flex items-center justify-center p-4 text-gray-200">
  <div class="max-w-2xl w-full">
    <!-- Main Card -->
    <div class="gradient-border overflow-hidden shadow-2xl">
      <!-- Header -->
      <div class="p-8 text-center border-b border-gray-700">
        <div class="flex justify-center mb-6">
          <div class="h-16 w-16 rounded-full bg-gradient-to-r from-blue-600 to-purple-600 flex items-center justify-center logo-glow">
            <span class="text-xl font-bold text-white">FIK</span>
          </div>
        </div>
        <h1 class="text-3xl font-bold mb-2 bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-purple-400">Hi {{ $payment->user->name }},</h1>
        <p class="text-gray-300">
          Your order <span class="font-semibold text-white">89K Corner</span>
          <br>was just dropped off. Go on, check it out.
        </p>
      </div>
      
      <!-- Order Details -->
      <div class="p-6 bg-slate-800">
        <div class="flex items-center justify-between mb-6">
          <h2 class="text-xl font-bold text-white">Your Order</h2>
          <span class="text-gray-400 font-mono">{{ $payment->invoice_code }}</span>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
          <div>
            <p class="text-gray-400 text-sm mb-1">Due date</p>
            <p class="font-medium">{{ \Carbon\Carbon::parse($payment->due_date)->format('d F Y') }}</p>
          </div>
          <div>
            <p class="text-gray-400 text-sm mb-1">Subject</p>
            <p class="font-medium">Payment for {{ $payment->room->name }}</p>
          </div>
          <div>
            <p class="text-gray-400 text-sm mb-1">Billed to</p>
            <p class="font-medium">{{  $payment->user->name }}</p>
            <p class="text-gray-400 text-sm">{{  $payment->user->email }}</p>
          </div>
          <div>
            <p class="text-gray-400 text-sm mb-1">Currency</p>
            <p class="font-medium">IDR - Indonesian Rupiah</p>
          </div>
        </div>
        
        <!-- Order Items -->
        <div class="glass-effect rounded-lg overflow-hidden mb-6">
          <div class="grid grid-cols-12 p-4 border-b border-gray-700 text-sm text-gray-400">
            <div class="col-span-8">DESCRIPTION</div>
            <div class="col-span-4 text-right">AMOUNT</div>
          </div>
          
          <div class="p-4">
            <div class="grid grid-cols-12 items-center gap-4 mb-4">
              <div class="col-span-10 md:col-span-8">
                <p class="font-medium">89K Corner for {{ $payment->room->name }}</p>
                <p class="text-gray-400 text-sm">for month {{ \Carbon\Carbon::parse($payment->due_date)->format('F') }}</p>
              </div>

              <div class="col-span-12 md:col-span-4 text-right">
                <p class="font-medium">{{ number_format($payment->room->price, 0, ',', '.') }} IDR</p>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Totals -->
        <div class="space-y-2 border-t border-gray-700 pt-4">
          <div class="flex justify-between">
            <span class="text-gray-400">Subtotal</span>
            <span>{{ number_format($payment->room->price, 0, ',', '.') }} IDR</span>
          </div>
          <div class="flex justify-between font-semibold text-lg pt-2 border-t border-gray-700 mt-2">
            <span>Total</span>
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-purple-400">{{ number_format($payment->room->price, 0, ',', '.') }} IDR</span>
          </div>
        </div>
      </div>
      
      <!-- Footer -->
      <div class="p-6 text-center text-sm text-gray-400 bg-slate-900">
        <p>Thank you for your purchase!</p>
      </div>
    </div>
    
    <!-- Bottom Text -->
    <div class="text-center mt-6 text-sm text-gray-400">
      <p>© 2025 FIK. All rights reserved.</p>
    </div>
  </div>
</body>
</html>