import { Component, OnInit } from '@angular/core';
import { Post } from './post';
import { MatDialog } from '@angular/material/dialog';
import { PostDialogComponent } from './post-dialog/post-dialog.component';
import { PostService } from './post.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
  title = 'lar_angular_front';
  public posts: Post[] = [];

  constructor(
    public dialog: MatDialog,
    public postService: PostService
  ) {}

  ngOnInit(): void {
    this.posts = this.postService.posts;
  }

  openDialog() {
    const dialogRef = this.dialog.open(PostDialogComponent, {
      width: '800px'
    });
    dialogRef.afterClosed().subscribe((result) => {
      if(result) {
        this.postService.salvar(result.post, result.arquivo);
      }
    });
  }
}
