import { Profile } from "./profile";

export class Post {
    public id : number;
    public title;
    public text: string;
    public status: string;
    public profile: Profile;
    private postedAt: Date;
    private created: Date;
    private modified: Date;
}