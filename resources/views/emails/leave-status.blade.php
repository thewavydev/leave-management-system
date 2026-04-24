<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Request Update</title>
</head>
<body style="margin:0;padding:0;background-color:#f1f5f9;font-family:Inter,Figtree,ui-sans-serif,system-ui,sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td align="center" style="padding:40px 20px;">
                <table role="presentation" width="100%" maxwidth="520" style="max-width:520px;background:#ffffff;border-radius:16px;overflow:hidden;border:1px solid #e2e8f0;" cellspacing="0" cellpadding="0" border="0">
                    <!-- Header -->
                    <tr>
                        <td style="background:#2563eb;padding:28px 32px;text-align:center;">
                            <h1 style="margin:0;color:#ffffff;font-size:20px;font-weight:700;letter-spacing:-0.02em;">LeaveFlow</h1>
                        </td>
                    </tr>
                    <!-- Body -->
                    <tr>
                        <td style="padding:32px;">
                            <h2 style="margin:0 0 8px;color:#0f172a;font-size:18px;font-weight:700;">Leave Request Update</h2>
                            <p style="margin:0 0 24px;color:#64748b;font-size:14px;line-height:1.6;">Hi {{ $leave->name }} {{ $leave->surname }}, your leave request has been reviewed.</p>

                            <!-- Status Badge -->
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin-bottom:24px;">
                                <tr>
                                    <td style="background:{{ $statusColor }}15;color:{{ $statusColor }};padding:8px 16px;border-radius:9999px;font-size:13px;font-weight:600;text-transform:capitalize;">
                                        Status: {{ $leave->status }}
                                    </td>
                                </tr>
                            </table>

                            <!-- Details Card -->
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:#f8fafc;border-radius:12px;border:1px solid #e2e8f0;">
                                <tr>
                                    <td style="padding:20px;">
                                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tr>
                                                <td style="padding-bottom:10px;">
                                                    <p style="margin:0;color:#94a3b8;font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;">Leave Type</p>
                                                    <p style="margin:4px 0 0;color:#0f172a;font-size:14px;font-weight:600;">{{ $leave->leave_type }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-bottom:10px;">
                                                    <p style="margin:0;color:#94a3b8;font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;">Period</p>
                                                    <p style="margin:4px 0 0;color:#0f172a;font-size:14px;font-weight:600;">{{ \Carbon\Carbon::parse($leave->start_date)->format('F j, Y') }} &mdash; {{ \Carbon\Carbon::parse($leave->end_date)->format('F j, Y') }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p style="margin:0;color:#94a3b8;font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;">ID Number</p>
                                                    <p style="margin:4px 0 0;color:#0f172a;font-size:14px;font-weight:600;font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,monospace;">{{ $leave->id_number }}</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin:24px 0 0;color:#64748b;font-size:13px;line-height:1.6;">If you have any questions, please contact your manager or HR department.</p>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td style="background:#f8fafc;padding:20px 32px;text-align:center;border-top:1px solid #e2e8f0;">
                            <p style="margin:0;color:#94a3b8;font-size:12px;">LeaveFlow Leave Management System</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>

