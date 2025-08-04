<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail  = 'support@qaswatelecom.com'; // Replace with your GoDaddy email
    public string $fromName   = 'Qaswa Telecom';
    public string $recipients = '';

    /**
     * The "user agent"
     */
    public string $userAgent = 'CodeIgniter';

    /**
     * The mail sending protocol: smtp
     */
    public string $protocol = 'smtp';

    /**
     * SMTP Server Address (GoDaddy SMTP Host)
     */
    public string $SMTPHost = 'smtpout.secureserver.net';

    /**
     * SMTP Username (Your GoDaddy email)
     */
    public string $SMTPUser = 'support@qaswatelecom.com';

    /**
     * SMTP Password (Your GoDaddy email password)
     */
    public string $SMTPPass = 'Qaswa890@.90';

    /**
     * SMTP Port
     */
    public int $SMTPPort = 465; // Use 587 for TLS, 465 for SSL

    /**
     * SMTP Timeout (in seconds)
     */
    public int $SMTPTimeout = 10;

    /**
     * Enable persistent SMTP connections
     */
    public bool $SMTPKeepAlive = false;

    /**
     * SMTP Encryption. Either tls or ssl
     */
    public string $SMTPCrypto = 'ssl'; // Use 'tls' for port 587

    /**
     * Enable word-wrap
     */
    public bool $wordWrap = true;

    /**
     * Character count to wrap at
     */
    public int $wrapChars = 76;

    /**
     * Type of mail, either 'text' or 'html'
     */
    public string $mailType = 'html';

    /**
     * Character set (utf-8, iso-8859-1, etc.)
     */
    public string $charset = 'UTF-8';

    /**
     * Whether to validate the email address
     */
    public bool $validate = false;

    /**
     * Email Priority. 1 = highest. 5 = lowest. 3 = normal
     */
    public int $priority = 3;

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     */
    public string $CRLF = "\r\n";

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     */
    public string $newline = "\r\n";

    /**
     * Enable BCC Batch Mode.
     */
    public bool $BCCBatchMode = false;

    /**
     * Number of emails in each BCC batch
     */
    public int $BCCBatchSize = 200;

    /**
     * Enable notify message from server
     */
    public bool $DSN = false;
}
