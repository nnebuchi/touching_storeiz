@extends('layouts.main.app')
@section('content')
    <style>
    :root {
      --primary-color: #FF8219;
      --primary-dark: #B25B12;
      --secondary-color: #0097B2;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #fdfdfd;
      color: #333;
    }

    .heading-section {
      background-color: var(--primary-color);
      color: white;
      padding: 2rem 1rem;
      text-align: center;
    }

    h2.section-title {
      color: var(--primary-dark);
      margin-top: 2rem;
    }

    .content-section {
      padding: 2rem 1rem;
    }

    a {
      color: var(--secondary-color);
    }

    a:hover {
      color: var(--primary-dark);
    }

    ul {
      list-style-type: disc;
      padding-left: 1.5rem;
    }
  </style>

  <div class="heading-section">
    <h1>PRIVACY POLICY, DISCLAIMER & TERMS OF SERVICE</h1>
  </div>

  <div class="container content-section">

    <h2 class="section-title" id="privacy">Privacy Policy</h2>
    <p>At Storihom, we respect your privacy and are committed to protecting your personal information. This Privacy Policy explains how we collect, use, disclose and safeguard your data when you use our platform to read or publish stories.</p>

    <h4>Information We Collect</h4>
    <ul>
      <li><strong>Personal Information:</strong> Name, email address, username, password when you sign up or log in. Optional profile info like bio, photo, and social links.</li>
      <li><strong>Usage Data:</strong> Pages viewed, stories read, time spent, interactions.</li>
      <li><strong>Submitted Content:</strong> Stories, comments, messages.</li>
      <li><strong>Device Info:</strong> IP address, browser type, OS, access times.</li>
    </ul>

    <h4>How We Use Your Information</h4>
    <ul>
      <li>Personalize and provide platform services</li>
      <li>Enable story publishing and management</li>
      <li>Communicate updates and support</li>
      <li>Improve performance and prevent fraud</li>
    </ul>

    <h4>Sharing Your Information</h4>
    <ul>
      <li>No sale of personal data</li>
      <li>Shared only with trusted providers or when legally required</li>
      <li>Users will be notified in case of business merger/sale</li>
    </ul>

    <h4>Your Rights</h4>
    <ul>
      <li>Edit your profile anytime</li>
      <li>Delete stories or account via support</li>
      <li>Opt out of emails/alerts via settings</li>
    </ul>

    <h4>Cookies & Tracking</h4>
    <ul>
      <li>Used to keep you logged in</li>
      <li>Understand user behavior</li>
      <li>Improve reading experience</li>
    </ul>

    <h4>Children's Privacy</h4>
    <p>This platform is not intended for users under 13. We do not knowingly collect information from children without parental consent.</p>

    <h4>Security</h4>
    <p>We implement standard security practices. Please use strong passwords and keep your login secure.</p>

    <h4>Contact Us</h4>
    <p>Email: <a href="mailto:storihom@gmail.com">storihom@gmail.com</a></p>

    <h4>Policy Updates</h4>
    <p>We may update this policy occasionally and notify you via email or alerts.</p>

    <hr class="my-5"/>

    <h2 class="section-title">Disclaimer</h2>
    <p>All stories, opinions and content on Storihom are the sole responsibility of their respective authors. We do not guarantee accuracy, completeness, or truthfulness.</p>
    <p>While we work to maintain a respectful space, Storihom is not liable for harm, offense, or misunderstandings from user content or interactions.</p>
    <p>Report any content that violates our guidelines. By using the platform, you do so at your own discretion and responsibility.</p>

    <hr class="my-5"/>

    <h2 class="section-title" id="terms">Terms of Service</h2>

    <h4>1. User Eligibility</h4>
    <p>You must be 13+ to use Storihom. Your registration info must be accurate.</p>

    <h4>2. User Accounts</h4>
    <p>You are responsible for keeping your account credentials safe. We’re not liable for unauthorized use caused by your negligence.</p>

    <h4>3. Content Ownership</h4>
    <p>You retain ownership of your original stories. By publishing, you grant Storihom a license to display and promote them.</p>

    <h4>4. Content Guidelines</h4>
    <ul>
      <li>No false or defamatory content</li>
      <li>No hateful, threatening, or offensive posts</li>
      <li>No pornography</li>
      <li>No copyright or trademark violations</li>
    </ul>
    <p>We reserve the right to remove content or suspend accounts that break these rules.</p>

    <h4>5. Platform Use</h4>
    <ul>
      <li>Don’t hack or overload our servers</li>
      <li>No bots or automated access</li>
      <li>Don’t harass or impersonate others</li>
    </ul>

    <h4>6. Termination</h4>
    <p>We may suspend or terminate your access without notice if terms are violated.</p>

    <h4>7. Limitation of Liability</h4>
    <p>We’re not liable for platform interruptions or other users’ actions.</p>

    <h4>8. Modifications</h4>
    <p>Terms may be updated anytime. Continued use means you accept the new terms.</p>

    <h4>9. Contact Us</h4>
    <p>Email: <a href="mailto:storihom@gmail.com">storihom@gmail.com</a></p>

  </div>
@endsection