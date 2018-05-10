import { Profile } from "./profile";

export class Post {
    public id : number;
    public title;
    public text: string;
    public teaser: string;
    public status: string;
    public profile: Profile;
    public postedAt: Date;
    public created: Date;
    public modified: Date;
}