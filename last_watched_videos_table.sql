CREATE TABLE last_watched_videos (
    user_id INT NOT NULL,
    video_id INT NOT NULL,
    last_watched_position INT NOT NULL,
    PRIMARY KEY (user_id, video_id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (video_id) REFERENCES videos(id)
);
