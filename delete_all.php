<?php
require 'config.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];

        try {
                if ($action === 'candidates') {
                            // حذف الأصوات أولاً لتفادي مشاكل المفاتيح الأجنبية
                                        $stmt = $pdo->prepare("DELETE FROM votes");
                                                    $stmt->execute();
                                                                $stmt = $pdo->prepare("DELETE FROM candidates");
                                                                            $stmt->execute();
                                                                                        $message = "تم حذف جميع المرشحين بنجاح.";
                                                                                                } elseif ($action === 'votes') {
                                                                                                            $stmt = $pdo->prepare("DELETE FROM votes");
                                                                                                                        $stmt->execute();
                                                                                                                                    $message = "تم حذف جميع الأصوات بنجاح.";
                                                                                                                                            } elseif ($action === 'centers') {
                                                                                                                                                        // حذف المراكز يؤدي إلى حذف المحطات والأصوات تلقائيًا بفضل ON DELETE CASCADE
                                                                                                                                                                    $stmt = $pdo->prepare("DELETE FROM centers");
                                                                                                                                                                                $stmt->execute();
                                                                                                                                                                                            $message = "تم حذف جميع المراكز والمحطات بنجاح.";
                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                $message = "طلب غير معروف.";
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                            } catch (Exception $e) {
                                                                                                                                                                                                                                    $message = "حدث خطأ: " . $e->getMessage();
                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                                            $message = "لم يتم تحديد إجراء للحذف.";
                                                                                                                                                                                                                                            }

                                                                                                                                                                                                                                            header("Location: admin_tools.php?msg=" . urlencode($message));
                                                                                                                                                                                                                                            exit;
                                                                                                                                                                                                                                            ?>