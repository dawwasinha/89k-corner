<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Reply to Your Report</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    
    body {
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f7;
    }
    
    .email-container {
      width: 100%;
      max-width: 600px;
      margin: 0 auto;
    }
    
    .email-content {
      background-color: #1a202c;
      color: #e2e8f0;
      border-radius: 8px;
      overflow: hidden;
      margin: 20px auto;
    }
    
    .pulse-blue {
      animation: pulse-blue 2s infinite;
    }
    
    @keyframes pulse-blue {
      0% {
        box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.7);
      }
      70% {
        box-shadow: 0 0 0 10px rgba(59, 130, 246, 0);
      }
      100% {
        box-shadow: 0 0 0 0 rgba(59, 130, 246, 0);
      }
    }
  </style>
</head>
<body style="font-family: 'Inter', sans-serif; margin: 0; padding: 0; background-color: #f5f5f7; color: #e2e8f0; text-align: center;">
  <div style="width: 100%; max-width: 600px; margin: 0 auto;">
    <!-- Main Card -->
    <div style="background-color: #0f172a; border-radius: 8px; overflow: hidden; margin: 20px auto; text-align: left; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
      <!-- Header -->
      <div style="padding: 24px; text-align: center; background-color: #111827; border-bottom: 1px solid #1e293b;">
        <div style="display: flex; justify-content: center; margin-bottom: 16px;">
          <div style="height: 64px; width: 64px; border-radius: 50%; background: linear-gradient(to right, #3b82f6, #06b6d4); display: flex; align-items: center; justify-content: center; margin: 0 auto;">
            <svg xmlns="http://www.w3.org/2000/svg" style="height: 32px; width: 32px; color: white;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
            </svg>
          </div>
        </div>
        <h1 style="font-size: 24px; font-weight: 700; margin-bottom: 8px; color: #3b82f6; text-align: center;">Reply form Maintenance Team</h1>
        <div style="display: inline-flex; align-items: center; padding: 4px 12px; border-radius: 9999px; background-color: rgba(30, 58, 138, 0.3); border: 1px solid rgba(59, 130, 246, 0.5); margin: 8px auto;">
          <span style="height: 8px; width: 8px; border-radius: 50%; background-color: #3b82f6; margin-right: 8px; display: inline-block;"></span>
          <span style="font-size: 14px; font-weight: 500; color: #60a5fa;">Response Received</span>
        </div>
      </div>
      
      <!-- Reply Section -->
      <div style="padding: 24px; background-color: #1a202c; border-bottom: 1px solid #1e293b;">
        <h2 style="font-size: 18px; font-weight: 600; margin-bottom: 16px; color: #93c5fd; display: flex; align-items: center;">
          <svg xmlns="http://www.w3.org/2000/svg" style="height: 20px; width: 20px; margin-right: 8px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
          </svg>
          Reply from 89K - Corner
        </h2>
        
        <div style="background-color: #1e293b; border-radius: 8px; padding: 20px; position: relative; border-left: 4px solid #3b82f6;">
          <div style="position: absolute; top: 10px; right: 10px; opacity: 0.1; font-size: 60px; line-height: 1; font-family: serif;">"</div>
          <p style="color: #e2e8f0; margin-bottom: 16px; text-align: center;">
            {{ $reportReply->body }}
          </p>
          <div style="display: flex; align-items: center; margin-top: 16px;">
            <div style="height: 40px; width: 40px; border-radius: 50%; background: linear-gradient(to right, #2563eb, #0891b2); display: flex; align-items: center; justify-content: center; margin-right: 12px;">
              <svg xmlns="http://www.w3.org/2000/svg" style="height: 20px; width: 20px; color: white;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </div>
            <div>
              <p style="font-weight: 500; color: white; margin: 0;">Admin</p>
              <p style="font-size: 12px; color: #9ca3af; margin: 0;">Maintenance Supervisor • {{  date('M d, Y', strtotime($reportReply->created_at)) }}</p>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Original Report Details -->
      <div style="padding: 24px; background-color: #111827;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
          <h2 style="font-size: 18px; font-weight: 600; color: #e11d48; margin: 0;">
            <svg xmlns="http://www.w3.org/2000/svg" style="height: 20px; width: 20px; margin-right: 8px; display: inline-block; vertical-align: middle;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Original Report
          </h2>
          <div style="padding: 4px 12px; border-radius: 9999px; background-color: rgba(6, 78, 59, 0.3); border: 1px solid rgba(5, 150, 105, 0.5); color: #10b981; font-size: 12px; font-weight: 500;">
            Resolved
          </div>
        </div>
        
        <!-- Report Info -->
        <div style="background-color: #1e293b; border-radius: 8px; overflow: hidden; margin-bottom: 24px;">
          <div style="border-bottom: 1px solid #334155; padding: 16px; text-align: center;">
            <p style="color: #9ca3af; font-size: 14px; margin-bottom: 4px;">Reported by</p>
            <p style="font-weight: 500; color: white; margin: 0;">{{ $reportReply->user->name }}</p>
          </div>
          <div style="border-bottom: 1px solid #334155; padding: 16px; text-align: center;">
            <p style="color: #9ca3af; font-size: 14px; margin-bottom: 4px;">Room name</p>
            <p style="font-weight: 500; color: white; margin: 0;">{{ $reportReply->report->room->name }}</p>
          </div>
          <div style="padding: 16px; text-align: center;">
            <p style="color: #9ca3af; font-size: 14px; margin-bottom: 4px;">Created at</p>
            <p style="font-weight: 500; color: white; margin: 0;">{{ \Carbon\Carbon::parse($reportReply->report['created_at'])->format('d F Y, H:i') }}</p>
          </div>
        </div>
        
        <!-- Issue Details -->
        <div style="margin-bottom: 24px;">
          <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 16px; color: #d1d5db;">
            <svg xmlns="http://www.w3.org/2000/svg" style="height: 16px; width: 16px; margin-right: 8px; display: inline-block; vertical-align: middle;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Issue Details
          </h3>
          
          <div style="background-color: #1e293b; border-radius: 8px; overflow: hidden;">
            <div style="padding: 16px; border-bottom: 1px solid #334155; text-align: center;">
              <p style="color: #9ca3af; font-size: 14px; margin-bottom: 4px;">Title</p>
              <p style="font-weight: 500; color: white; margin: 0;">{{ $reportReply->report['title'] }}</p>
            </div>
            <div style="padding: 16px; text-align: center;">
              <p style="color: #9ca3af; font-size: 14px; margin-bottom: 4px;">Description</p>
              <p style="font-weight: 500; color: white; margin: 0;">{{ $reportReply->report['description'] }}</p>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Footer -->
      <div style="padding: 16px; text-align: center; font-size: 14px; color: #9ca3af; background-color: #0f172a; border-top: 1px solid #1e293b;">
        <p style="margin: 0;">This is an automated notification. Please do not reply to this email.</p>
        <div style="margin-top: 8px;">
          <p style="margin: 0;">© 2025 Facility Management System. All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>