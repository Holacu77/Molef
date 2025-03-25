<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php echo $pageTitle ?? "نظام الانتخابات"; ?></title>
        <!-- Bootstrap 5 RTL -->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
            <style>
                body {
                      background-color: #f9fafb;
                            direction: rtl;
                                }
                                    .navbar {
                                          background: linear-gradient(45deg, #0d6efd, #6610f2);
                                              }
                                                  .navbar-brand, .nav-link {
                                                        color: #fff !important;
                                                              font-weight: bold;
                                                                  }
                                                                      .hero {
                                                                            background: linear-gradient(135deg, #0d6efd, #6610f2);
                                                                                  color: #fff;
                                                                                        padding: 60px 15px;
                                                                                              text-align: center;
                                                                                                  }
                                                                                                      .hero h1 {
                                                                                                            font-size: 2.5rem;
                                                                                                                  margin-bottom: 15px;
                                                                                                                      }
                                                                                                                          .hero p {
                                                                                                                                font-size: 1.1rem;
                                                                                                                                    }
                                                                                                                                        .btn-custom {
                                                                                                                                              border-radius: 50px;
                                                                                                                                                    padding: 10px 20px;
                                                                                                                                                          margin: 5px;
                                                                                                                                                              }
                                                                                                                                                                  .footer {
                                                                                                                                                                        background: #6610f2;
                                                                                                                                                                              color: #fff;
                                                                                                                                                                                    text-align: center;
                                                                                                                                                                                          padding: 15px 0;
                                                                                                                                                                                                margin-top: 30px;
                                                                                                                                                                                                    }
                                                                                                                                                                                                      </style>
                                                                                                                                                                                                      </head>
                                                                                                                                                                                                      <body>
                                                                                                                                                                                                      <nav class="navbar navbar-expand-lg">
                                                                                                                                                                                                        <div class="container">
                                                                                                                                                                                                            <a class="navbar-brand" href="index.php">نظام الانتخابات</a>
                                                                                                                                                                                                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                                                                                                                                                                                                                            aria-controls="navbarNav" aria-expanded="false" aria-label="تبديل التنقل">
                                                                                                                                                                                                                                  <span class="navbar-toggler-icon"></span>
                                                                                                                                                                                                                                      </button>
                                                                                                                                                                                                                                          <div class="collapse navbar-collapse" id="navbarNav">
                                                                                                                                                                                                                                                   <ul class="navbar-nav ms-auto">
                                                                                                                                                                                                                                                              <li class="nav-item"><a class="nav-link" href="add_candidate.php">إضافة مرشح</a></li>
                                                                                                                                                                                                                                                                         <li class="nav-item"><a class="nav-link" href="add_center.php">إضافة مركز</a></li>
                                                                                                                                                                                                                                                                        <li class="nav-item"><a class="nav-link" href="add_votes.php">إدخال الأصوات</a></li>
                                                                                                                                                                                                                                                                                                          <li class="nav-item"><a class="nav-link" href="upload_csv.php">رفع CSV</a></li>
                                                                                                                                                                                                                                                                                                                     <li class="nav-item"><a class="nav-link" href="logout.php">تسجيل الخروج</a></li>
                                                                                                                                                                                                                                                                                                                              </ul>
                                                                                                                                                                                                                                                                                                                                  </div>
                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                    </nav>
                                                                                                                                                                                                                                                                                                                                    <div class="container my-4">