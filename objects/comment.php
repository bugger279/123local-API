<?php
class Comment{
    // database connection and table name
    private $conn;
    private $comments_table = "comments";
    // Comments Object
    public $commentId;
    public $commentTimestamp;
    public $commentAuthorName;
    public $commentContent;
    public $commentAuthorPhotoUrl;
    public $commentOwnerResponse;

    public function __construct($db){
        $this->conn = $db;
    }

// Read a comment
function readComments($commentId){
    $query = "SELECT * FROM " . $this->comments_table . " c WHERE c.commentId = $commentId";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
}
// End of read Comment

// Create new comment
function createComment(){
    $date = date('Y-m-d H:i:s');
    $query = "INSERT INTO
                " . $this->comments_table . "
            SET
                reviewId=:reviewId,
                commentTimestamp=:commentTimestamp,
                commentAuthorName=:commentAuthorName,
                commentContent=:commentContent,
                commentAuthorPhotoUrl=:commentAuthorPhotoUrl";

    $stmt = $this->conn->prepare($query);
    $this->reviewId=htmlspecialchars(strip_tags($this->reviewId));
    $this->commentTimestamp=htmlspecialchars(strip_tags($this->commentTimestamp));
    $this->commentAuthorName=htmlspecialchars(strip_tags($this->commentAuthorName));
    $this->commentContent=htmlspecialchars(strip_tags($this->commentContent));
    $this->commentAuthorPhotoUrl=htmlspecialchars(strip_tags($this->commentAuthorPhotoUrl));

    // print_r($this->commentTimestamp); die();

    $stmt->bindParam(":reviewId", $this->reviewId);
    $stmt->bindParam(":commentTimestamp", $this->commentTimestamp);
    $stmt->bindParam(":commentAuthorName", $this->commentAuthorName);
    $stmt->bindParam(":commentContent", $this->commentContent);
    $stmt->bindParam(":commentAuthorPhotoUrl", $this->commentAuthorPhotoUrl);

    if($stmt->execute()){
        $lastId = $this->conn->lastInsertId();
        http_response_code(201);
        echo json_encode(array(
            "message" => "Comment Created Successfully!",
            "commentId" => $lastId
        ));
    } else {
        http_response_code(503);
        echo json_encode(array("issues" => [
            "message" => "Unable to create Comment.",
            "status" => "Comment wasn't created.",
            "errorCode" => "503",
            "issue" => "Service is unavailable"
        ]));
    }
}
// End of create new Comment

// Delete Existings Comments
function deleteComment(){
    $query = "DELETE FROM " . $this->comments_table . " WHERE commentId = $this->id";
    $stmt = $this->conn->prepare($query);
    $this->id=htmlspecialchars(strip_tags($this->id));
    $stmt->bindParam(":commentId", $this->id);
    if($stmt->execute()) {
        $count = $stmt->rowCount();
    }
        if ($count > 0) {
            http_response_code(200);
            echo json_encode(array(
                "message" => "Comment Deleted Successfully",
                "id" => $this->id
            ));
        } else {
            http_response_code(404);
            echo json_encode(array("issue" => "The requested comment does not exist on your site."));
        }
    return false;
}
// End of Delete Existing Comments

// Update Comments
function updateComment(){
    $query = "UPDATE
                " . $this->comments_table . "
            SET
                reviewId=:reviewId,
                commentAuthorName=:commentAuthorName,
                commentContent=:commentContent,
                commentAuthorPhotoUrl=:commentAuthorPhotoUrl
            WHERE
                commentId=:commentId";

    // prepare query statement
    $stmt = $this->conn->prepare($query);
    // sanitize
    $this->commentId=htmlspecialchars(strip_tags($this->id));
    $this->reviewId=htmlspecialchars(strip_tags($this->reviewId));
    $this->commentAuthorName=htmlspecialchars(strip_tags($this->commentAuthorName));
    $this->commentContent=htmlspecialchars(strip_tags($this->commentContent));
    $this->commentAuthorPhotoUrl=htmlspecialchars(strip_tags($this->commentAuthorPhotoUrl));

    // bind new values
    $stmt->bindParam(':commentId', $this->commentId);
    $stmt->bindParam(":reviewId", $this->reviewId);
    $stmt->bindParam(":commentAuthorName", $this->commentAuthorName);
    $stmt->bindParam(":commentContent", $this->commentContent);
    $stmt->bindParam(":commentAuthorPhotoUrl", $this->commentAuthorPhotoUrl);

    // execute the query
    if ($stmt->execute()) {
        return true;
    }
    $count = $stmt->rowCount();
    // print_r($count);
        if ($count > 0) {
            return 1;
        }
    return false;
}
// End of Update Comments
}