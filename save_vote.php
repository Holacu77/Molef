<?php
// save_vote.php - يُعالج حفظ الأصوات عبر AJAX
require 'config.php';
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $center_id = (int) $_POST['center_id'];
        $station_id = (int) $_POST['station_id'];
            $candidate_id = (int) $_POST['candidate_id'];
                $vote_count = (int) $_POST['vote_count'];

                    if ($center_id && $station_id && $candidate_id && $vote_count >= 0) {
                            $stmt = $pdo->prepare("SELECT id FROM votes WHERE center_id = :center_id AND station_id = :station_id AND candidate_id = :candidate_id");
                                    $stmt->execute([
                                                'center_id'    => $center_id,
                                                            'station_id'   => $station_id,
                                                                        'candidate_id' => $candidate_id
                                                                                ]);
                                                                                        if ($stmt->rowCount() > 0) {
                                                                                                    $update = $pdo->prepare("UPDATE votes SET vote_count = :vote_count WHERE center_id = :center_id AND station_id = :station_id AND candidate_id = :candidate_id");
                                                                                                                $update->execute([
                                                                                                                                'vote_count'   => $vote_count,
                                                                                                                                                'center_id'    => $center_id,
                                                                                                                                                                'station_id'   => $station_id,
                                                                                                                                                                                'candidate_id' => $candidate_id
                                                                                                                                                                                            ]);
                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                $insert = $pdo->prepare("INSERT INTO votes (candidate_id, center_id, station_id, vote_count) VALUES (:candidate_id, :center_id, :station_id, :vote_count)");
                                                                                                                                                                                                                            $insert->execute([
                                                                                                                                                                                                                                            'candidate_id' => $candidate_id,
                                                                                                                                                                                                                                                            'center_id'    => $center_id,
                                                                                                                                                                                                                                                                            'station_id'   => $station_id,
                                                                                                                                                                                                                                                                                            'vote_count'   => $vote_count
                                                                                                                                                                                                                                                                                                        ]);
                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                        echo json_encode(['status' => 'success', 'message' => 'تم حفظ الأصوات']);
                                                                                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                                                                                                    echo json_encode(['status' => 'error', 'message' => 'يرجى ملء جميع الحقول بشكل صحيح.']);
                                                                                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                                                                                                                                            echo json_encode(['status' => 'error', 'message' => 'طريقة الطلب غير صحيحة.']);
                                                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                                            ?>