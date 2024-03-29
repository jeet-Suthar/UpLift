PGDMP                      |            uplift_test    16.1    16.1 �    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    16568    uplift_test    DATABASE     ~   CREATE DATABASE uplift_test WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'English_India.1252';
    DROP DATABASE uplift_test;
                postgres    false            �            1259    16815    aok    TABLE     �   CREATE TABLE public.aok (
    act_id integer NOT NULL,
    user_id integer,
    context text NOT NULL,
    media text NOT NULL,
    total_gratitude integer DEFAULT 0,
    uploaded_time timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.aok;
       public         heap    postgres    false            �            1259    16814    aok_act_id_seq    SEQUENCE     �   CREATE SEQUENCE public.aok_act_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.aok_act_id_seq;
       public          postgres    false    235            �           0    0    aok_act_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.aok_act_id_seq OWNED BY public.aok.act_id;
          public          postgres    false    234            �            1259    16683 
   comment_reply    TABLE     �   CREATE TABLE public.comment_reply (
    reply_id integer NOT NULL,
    comment_id integer,
    user_id integer,
    content text NOT NULL,
    total_reply_likes integer DEFAULT 0,
    replied_time timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);
 !   DROP TABLE public.comment_reply;
       public         heap    postgres    false            �            1259    16682    comment_reply_reply_id_seq    SEQUENCE     �   CREATE SEQUENCE public.comment_reply_reply_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.comment_reply_reply_id_seq;
       public          postgres    false    223            �           0    0    comment_reply_reply_id_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.comment_reply_reply_id_seq OWNED BY public.comment_reply.reply_id;
          public          postgres    false    222            �            1259    16662    comments    TABLE     �   CREATE TABLE public.comments (
    comment_id integer NOT NULL,
    post_id integer,
    user_id integer,
    content text NOT NULL,
    total_comment_likes integer DEFAULT 0,
    commented_time timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);
    DROP TABLE public.comments;
       public         heap    postgres    false            �            1259    16661    comments_comment_id_seq    SEQUENCE     �   CREATE SEQUENCE public.comments_comment_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.comments_comment_id_seq;
       public          postgres    false    221            �           0    0    comments_comment_id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.comments_comment_id_seq OWNED BY public.comments.comment_id;
          public          postgres    false    220            �            1259    16856 
   current_gwall    TABLE     U   CREATE TABLE public.current_gwall (
    user_id integer,
    gratitude_id integer
);
 !   DROP TABLE public.current_gwall;
       public         heap    postgres    false            �            1259    16831    gratitude_feedback    TABLE     �   CREATE TABLE public.gratitude_feedback (
    gratitude_id integer NOT NULL,
    user_id integer,
    act_id integer,
    gratitude character varying(255) NOT NULL,
    gratitude_time timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
 &   DROP TABLE public.gratitude_feedback;
       public         heap    postgres    false            �            1259    16830 "   gratitude_feedback_gratiude_id_seq    SEQUENCE     �   CREATE SEQUENCE public.gratitude_feedback_gratiude_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 9   DROP SEQUENCE public.gratitude_feedback_gratiude_id_seq;
       public          postgres    false    237            �           0    0 "   gratitude_feedback_gratiude_id_seq    SEQUENCE OWNED BY     j   ALTER SEQUENCE public.gratitude_feedback_gratiude_id_seq OWNED BY public.gratitude_feedback.gratitude_id;
          public          postgres    false    236            �            1259    16766    habit_verification    TABLE       CREATE TABLE public.habit_verification (
    verification_id integer NOT NULL,
    habit_id integer,
    user_id integer,
    status boolean DEFAULT false,
    feedback character varying(50),
    verified_time timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
 &   DROP TABLE public.habit_verification;
       public         heap    postgres    false            �            1259    16765 &   habit_verification_verification_id_seq    SEQUENCE     �   CREATE SEQUENCE public.habit_verification_verification_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 =   DROP SEQUENCE public.habit_verification_verification_id_seq;
       public          postgres    false    232            �           0    0 &   habit_verification_verification_id_seq    SEQUENCE OWNED BY     q   ALTER SEQUENCE public.habit_verification_verification_id_seq OWNED BY public.habit_verification.verification_id;
          public          postgres    false    231            �            1259    16752    habits    TABLE     .  CREATE TABLE public.habits (
    habit_id integer NOT NULL,
    user_id integer,
    title character varying(20) NOT NULL,
    description character varying(200),
    start_date timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    no_of_days integer NOT NULL,
    succes boolean DEFAULT false
);
    DROP TABLE public.habits;
       public         heap    postgres    false            �            1259    16751    habits_habit_id_seq    SEQUENCE     �   CREATE SEQUENCE public.habits_habit_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.habits_habit_id_seq;
       public          postgres    false    230            �           0    0    habits_habit_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.habits_habit_id_seq OWNED BY public.habits.habit_id;
          public          postgres    false    229            �            1259    16624    likes    TABLE     �   CREATE TABLE public.likes (
    post_id integer,
    user_id integer,
    liked_time timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);
    DROP TABLE public.likes;
       public         heap    postgres    false            �            1259    16893    monthly_challenges    TABLE     b  CREATE TABLE public.monthly_challenges (
    challenge_id integer NOT NULL,
    title character varying(30) NOT NULL,
    description character varying(255) NOT NULL,
    no_of_days integer NOT NULL,
    people_joined integer DEFAULT 0 NOT NULL,
    reward_id integer,
    challenge_time timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
 &   DROP TABLE public.monthly_challenges;
       public         heap    postgres    false            �            1259    16892 #   monthly_challenges_challenge_id_seq    SEQUENCE     �   CREATE SEQUENCE public.monthly_challenges_challenge_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 :   DROP SEQUENCE public.monthly_challenges_challenge_id_seq;
       public          postgres    false    243            �           0    0 #   monthly_challenges_challenge_id_seq    SEQUENCE OWNED BY     k   ALTER SEQUENCE public.monthly_challenges_challenge_id_seq OWNED BY public.monthly_challenges.challenge_id;
          public          postgres    false    242            �            1259    16736 
   notifications    TABLE     0  CREATE TABLE public.notifications (
    notification_id integer NOT NULL,
    receiver_id integer,
    notification_type character varying(10) NOT NULL,
    notification_content text NOT NULL,
    seen boolean DEFAULT false,
    notification_time timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);
 !   DROP TABLE public.notifications;
       public         heap    postgres    false            �            1259    16735 !   notifications_notification_id_seq    SEQUENCE     �   CREATE SEQUENCE public.notifications_notification_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 8   DROP SEQUENCE public.notifications_notification_id_seq;
       public          postgres    false    228            �           0    0 !   notifications_notification_id_seq    SEQUENCE OWNED BY     g   ALTER SEQUENCE public.notifications_notification_id_seq OWNED BY public.notifications.notification_id;
          public          postgres    false    227            �            1259    16591    posts    TABLE     V  CREATE TABLE public.posts (
    post_id integer NOT NULL,
    user_id integer,
    media_url character varying(100) NOT NULL,
    caption character varying(300),
    total_likes integer DEFAULT 0,
    total_comments integer DEFAULT 0,
    uploaded_time timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    type character varying(10)
);
    DROP TABLE public.posts;
       public         heap    postgres    false            �            1259    16570    users    TABLE     �  CREATE TABLE public.users (
    user_id integer NOT NULL,
    fname character varying(30) NOT NULL,
    lname character varying(20) NOT NULL,
    email character varying(50) NOT NULL,
    user_password character varying(255) NOT NULL,
    profile_dp character varying(50),
    bio text,
    join_date date DEFAULT CURRENT_TIMESTAMP,
    birth_date date DEFAULT CURRENT_TIMESTAMP,
    last_login timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    active boolean DEFAULT false NOT NULL,
    gwall_public boolean DEFAULT false,
    anonymous_username character varying(30),
    anonymous_profile_dp text,
    username character varying(50) NOT NULL
);
    DROP TABLE public.users;
       public         heap    postgres    false            �            1259    17011    post_summary    VIEW     �  CREATE VIEW public.post_summary AS
 SELECT p.post_id,
    p.user_id,
    u.username,
    u.profile_dp,
    p.media_url,
    p.type,
    p.caption,
    p.uploaded_time,
    COALESCE(l.total_likes, (0)::bigint) AS total_likes,
    COALESCE(c.total_comments, (0)::bigint) AS total_comments
   FROM (((public.posts p
     LEFT JOIN public.users u ON ((p.user_id = u.user_id)))
     LEFT JOIN ( SELECT likes.post_id,
            count(*) AS total_likes
           FROM public.likes
          GROUP BY likes.post_id) l ON ((p.post_id = l.post_id)))
     LEFT JOIN ( SELECT comments.post_id,
            count(*) AS total_comments
           FROM public.comments
          GROUP BY comments.post_id) c ON ((p.post_id = c.post_id)));
    DROP VIEW public.post_summary;
       public          postgres    false    216    216    216    218    218    218    218    218    218    219    221            �            1259    16590    posts_post_id_seq    SEQUENCE     �   CREATE SEQUENCE public.posts_post_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.posts_post_id_seq;
       public          postgres    false    218            �           0    0    posts_post_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.posts_post_id_seq OWNED BY public.posts.post_id;
          public          postgres    false    217            �            1259    16870    rewards    TABLE     �   CREATE TABLE public.rewards (
    reward_id integer NOT NULL,
    title character varying(20) NOT NULL,
    description character varying(100) NOT NULL,
    img text NOT NULL
);
    DROP TABLE public.rewards;
       public         heap    postgres    false            �            1259    16869    rewards_reward_id_seq    SEQUENCE     �   CREATE SEQUENCE public.rewards_reward_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.rewards_reward_id_seq;
       public          postgres    false    240            �           0    0    rewards_reward_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.rewards_reward_id_seq OWNED BY public.rewards.reward_id;
          public          postgres    false    239            �            1259    16704    stories    TABLE       CREATE TABLE public.stories (
    story_id integer NOT NULL,
    user_id integer,
    media text NOT NULL,
    caption text,
    total_story_likes integer DEFAULT 0,
    total_story_views integer DEFAULT 0,
    uploaded_time timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);
    DROP TABLE public.stories;
       public         heap    postgres    false            �            1259    16703    stories_story_id_seq    SEQUENCE     �   CREATE SEQUENCE public.stories_story_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.stories_story_id_seq;
       public          postgres    false    225            �           0    0    stories_story_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.stories_story_id_seq OWNED BY public.stories.story_id;
          public          postgres    false    224            �            1259    16720    story_viewed    TABLE     �   CREATE TABLE public.story_viewed (
    story_id integer,
    user_id integer,
    liked boolean DEFAULT false,
    viewed_time timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);
     DROP TABLE public.story_viewed;
       public         heap    postgres    false            �            1259    16878    user_reward    TABLE     �   CREATE TABLE public.user_reward (
    user_id integer,
    reward_id integer,
    reward_earn_time timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.user_reward;
       public         heap    postgres    false            �            1259    16569    users_user_id_seq    SEQUENCE     �   CREATE SEQUENCE public.users_user_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.users_user_id_seq;
       public          postgres    false    216            �           0    0    users_user_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.users_user_id_seq OWNED BY public.users.user_id;
          public          postgres    false    215            �            1259    16785    verification_club    TABLE     X   CREATE TABLE public.verification_club (
    user_id integer,
    verifier_id integer
);
 %   DROP TABLE public.verification_club;
       public         heap    postgres    false            �            1259    16907    verification_tasks    TABLE     �   CREATE TABLE public.verification_tasks (
    task_id integer NOT NULL,
    verifier_id integer,
    applicant_id integer,
    habit_id integer,
    task_status boolean DEFAULT false
);
 &   DROP TABLE public.verification_tasks;
       public         heap    postgres    false            �            1259    16906    verification_tasks_task_id_seq    SEQUENCE     �   CREATE SEQUENCE public.verification_tasks_task_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 5   DROP SEQUENCE public.verification_tasks_task_id_seq;
       public          postgres    false    245            �           0    0    verification_tasks_task_id_seq    SEQUENCE OWNED BY     a   ALTER SEQUENCE public.verification_tasks_task_id_seq OWNED BY public.verification_tasks.task_id;
          public          postgres    false    244            �           2604    16818 
   aok act_id    DEFAULT     h   ALTER TABLE ONLY public.aok ALTER COLUMN act_id SET DEFAULT nextval('public.aok_act_id_seq'::regclass);
 9   ALTER TABLE public.aok ALTER COLUMN act_id DROP DEFAULT;
       public          postgres    false    235    234    235            |           2604    16686    comment_reply reply_id    DEFAULT     �   ALTER TABLE ONLY public.comment_reply ALTER COLUMN reply_id SET DEFAULT nextval('public.comment_reply_reply_id_seq'::regclass);
 E   ALTER TABLE public.comment_reply ALTER COLUMN reply_id DROP DEFAULT;
       public          postgres    false    223    222    223            y           2604    16665    comments comment_id    DEFAULT     z   ALTER TABLE ONLY public.comments ALTER COLUMN comment_id SET DEFAULT nextval('public.comments_comment_id_seq'::regclass);
 B   ALTER TABLE public.comments ALTER COLUMN comment_id DROP DEFAULT;
       public          postgres    false    221    220    221            �           2604    16834    gratitude_feedback gratitude_id    DEFAULT     �   ALTER TABLE ONLY public.gratitude_feedback ALTER COLUMN gratitude_id SET DEFAULT nextval('public.gratitude_feedback_gratiude_id_seq'::regclass);
 N   ALTER TABLE public.gratitude_feedback ALTER COLUMN gratitude_id DROP DEFAULT;
       public          postgres    false    237    236    237            �           2604    16769 "   habit_verification verification_id    DEFAULT     �   ALTER TABLE ONLY public.habit_verification ALTER COLUMN verification_id SET DEFAULT nextval('public.habit_verification_verification_id_seq'::regclass);
 Q   ALTER TABLE public.habit_verification ALTER COLUMN verification_id DROP DEFAULT;
       public          postgres    false    232    231    232            �           2604    16755    habits habit_id    DEFAULT     r   ALTER TABLE ONLY public.habits ALTER COLUMN habit_id SET DEFAULT nextval('public.habits_habit_id_seq'::regclass);
 >   ALTER TABLE public.habits ALTER COLUMN habit_id DROP DEFAULT;
       public          postgres    false    230    229    230            �           2604    16896    monthly_challenges challenge_id    DEFAULT     �   ALTER TABLE ONLY public.monthly_challenges ALTER COLUMN challenge_id SET DEFAULT nextval('public.monthly_challenges_challenge_id_seq'::regclass);
 N   ALTER TABLE public.monthly_challenges ALTER COLUMN challenge_id DROP DEFAULT;
       public          postgres    false    243    242    243            �           2604    16739    notifications notification_id    DEFAULT     �   ALTER TABLE ONLY public.notifications ALTER COLUMN notification_id SET DEFAULT nextval('public.notifications_notification_id_seq'::regclass);
 L   ALTER TABLE public.notifications ALTER COLUMN notification_id DROP DEFAULT;
       public          postgres    false    227    228    228            t           2604    16594 
   posts post_id    DEFAULT     n   ALTER TABLE ONLY public.posts ALTER COLUMN post_id SET DEFAULT nextval('public.posts_post_id_seq'::regclass);
 <   ALTER TABLE public.posts ALTER COLUMN post_id DROP DEFAULT;
       public          postgres    false    217    218    218            �           2604    16873    rewards reward_id    DEFAULT     v   ALTER TABLE ONLY public.rewards ALTER COLUMN reward_id SET DEFAULT nextval('public.rewards_reward_id_seq'::regclass);
 @   ALTER TABLE public.rewards ALTER COLUMN reward_id DROP DEFAULT;
       public          postgres    false    240    239    240                       2604    16707    stories story_id    DEFAULT     t   ALTER TABLE ONLY public.stories ALTER COLUMN story_id SET DEFAULT nextval('public.stories_story_id_seq'::regclass);
 ?   ALTER TABLE public.stories ALTER COLUMN story_id DROP DEFAULT;
       public          postgres    false    224    225    225            n           2604    16573 
   users user_id    DEFAULT     n   ALTER TABLE ONLY public.users ALTER COLUMN user_id SET DEFAULT nextval('public.users_user_id_seq'::regclass);
 <   ALTER TABLE public.users ALTER COLUMN user_id DROP DEFAULT;
       public          postgres    false    215    216    216            �           2604    16910    verification_tasks task_id    DEFAULT     �   ALTER TABLE ONLY public.verification_tasks ALTER COLUMN task_id SET DEFAULT nextval('public.verification_tasks_task_id_seq'::regclass);
 I   ALTER TABLE public.verification_tasks ALTER COLUMN task_id DROP DEFAULT;
       public          postgres    false    244    245    245            w          0    16815    aok 
   TABLE DATA           ^   COPY public.aok (act_id, user_id, context, media, total_gratitude, uploaded_time) FROM stdin;
    public          postgres    false    235   ��       k          0    16683 
   comment_reply 
   TABLE DATA           p   COPY public.comment_reply (reply_id, comment_id, user_id, content, total_reply_likes, replied_time) FROM stdin;
    public          postgres    false    223   ��       i          0    16662    comments 
   TABLE DATA           n   COPY public.comments (comment_id, post_id, user_id, content, total_comment_likes, commented_time) FROM stdin;
    public          postgres    false    221   ݲ       z          0    16856 
   current_gwall 
   TABLE DATA           >   COPY public.current_gwall (user_id, gratitude_id) FROM stdin;
    public          postgres    false    238   ��       y          0    16831    gratitude_feedback 
   TABLE DATA           f   COPY public.gratitude_feedback (gratitude_id, user_id, act_id, gratitude, gratitude_time) FROM stdin;
    public          postgres    false    237   ۳       t          0    16766    habit_verification 
   TABLE DATA           q   COPY public.habit_verification (verification_id, habit_id, user_id, status, feedback, verified_time) FROM stdin;
    public          postgres    false    232   ��       r          0    16752    habits 
   TABLE DATA           g   COPY public.habits (habit_id, user_id, title, description, start_date, no_of_days, succes) FROM stdin;
    public          postgres    false    230   �       g          0    16624    likes 
   TABLE DATA           =   COPY public.likes (post_id, user_id, liked_time) FROM stdin;
    public          postgres    false    219   2�                 0    16893    monthly_challenges 
   TABLE DATA           �   COPY public.monthly_challenges (challenge_id, title, description, no_of_days, people_joined, reward_id, challenge_time) FROM stdin;
    public          postgres    false    243   O�       p          0    16736 
   notifications 
   TABLE DATA           �   COPY public.notifications (notification_id, receiver_id, notification_type, notification_content, seen, notification_time) FROM stdin;
    public          postgres    false    228   l�       f          0    16591    posts 
   TABLE DATA           w   COPY public.posts (post_id, user_id, media_url, caption, total_likes, total_comments, uploaded_time, type) FROM stdin;
    public          postgres    false    218   ��       |          0    16870    rewards 
   TABLE DATA           E   COPY public.rewards (reward_id, title, description, img) FROM stdin;
    public          postgres    false    240   S�       m          0    16704    stories 
   TABLE DATA           y   COPY public.stories (story_id, user_id, media, caption, total_story_likes, total_story_views, uploaded_time) FROM stdin;
    public          postgres    false    225   p�       n          0    16720    story_viewed 
   TABLE DATA           M   COPY public.story_viewed (story_id, user_id, liked, viewed_time) FROM stdin;
    public          postgres    false    226   ��       }          0    16878    user_reward 
   TABLE DATA           K   COPY public.user_reward (user_id, reward_id, reward_earn_time) FROM stdin;
    public          postgres    false    241   ��       d          0    16570    users 
   TABLE DATA           �   COPY public.users (user_id, fname, lname, email, user_password, profile_dp, bio, join_date, birth_date, last_login, active, gwall_public, anonymous_username, anonymous_profile_dp, username) FROM stdin;
    public          postgres    false    216   Ƿ       u          0    16785    verification_club 
   TABLE DATA           A   COPY public.verification_club (user_id, verifier_id) FROM stdin;
    public          postgres    false    233   ��       �          0    16907    verification_tasks 
   TABLE DATA           g   COPY public.verification_tasks (task_id, verifier_id, applicant_id, habit_id, task_status) FROM stdin;
    public          postgres    false    245   ۼ       �           0    0    aok_act_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.aok_act_id_seq', 1, false);
          public          postgres    false    234            �           0    0    comment_reply_reply_id_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.comment_reply_reply_id_seq', 25, true);
          public          postgres    false    222            �           0    0    comments_comment_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.comments_comment_id_seq', 46, true);
          public          postgres    false    220            �           0    0 "   gratitude_feedback_gratiude_id_seq    SEQUENCE SET     Q   SELECT pg_catalog.setval('public.gratitude_feedback_gratiude_id_seq', 1, false);
          public          postgres    false    236            �           0    0 &   habit_verification_verification_id_seq    SEQUENCE SET     U   SELECT pg_catalog.setval('public.habit_verification_verification_id_seq', 1, false);
          public          postgres    false    231            �           0    0    habits_habit_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.habits_habit_id_seq', 1, false);
          public          postgres    false    229            �           0    0 #   monthly_challenges_challenge_id_seq    SEQUENCE SET     R   SELECT pg_catalog.setval('public.monthly_challenges_challenge_id_seq', 1, false);
          public          postgres    false    242            �           0    0 !   notifications_notification_id_seq    SEQUENCE SET     P   SELECT pg_catalog.setval('public.notifications_notification_id_seq', 1, false);
          public          postgres    false    227            �           0    0    posts_post_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.posts_post_id_seq', 38, true);
          public          postgres    false    217            �           0    0    rewards_reward_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.rewards_reward_id_seq', 1, false);
          public          postgres    false    239            �           0    0    stories_story_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.stories_story_id_seq', 1, false);
          public          postgres    false    224            �           0    0    users_user_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.users_user_id_seq', 33, true);
          public          postgres    false    215            �           0    0    verification_tasks_task_id_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('public.verification_tasks_task_id_seq', 1, false);
          public          postgres    false    244            �           2606    16824    aok aok_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.aok
    ADD CONSTRAINT aok_pkey PRIMARY KEY (act_id);
 6   ALTER TABLE ONLY public.aok DROP CONSTRAINT aok_pkey;
       public            postgres    false    235            �           2606    16692     comment_reply comment_reply_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.comment_reply
    ADD CONSTRAINT comment_reply_pkey PRIMARY KEY (reply_id);
 J   ALTER TABLE ONLY public.comment_reply DROP CONSTRAINT comment_reply_pkey;
       public            postgres    false    223            �           2606    16671    comments comments_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.comments
    ADD CONSTRAINT comments_pkey PRIMARY KEY (comment_id);
 @   ALTER TABLE ONLY public.comments DROP CONSTRAINT comments_pkey;
       public            postgres    false    221            �           2606    16837 *   gratitude_feedback gratitude_feedback_pkey 
   CONSTRAINT     r   ALTER TABLE ONLY public.gratitude_feedback
    ADD CONSTRAINT gratitude_feedback_pkey PRIMARY KEY (gratitude_id);
 T   ALTER TABLE ONLY public.gratitude_feedback DROP CONSTRAINT gratitude_feedback_pkey;
       public            postgres    false    237            �           2606    16773 *   habit_verification habit_verification_pkey 
   CONSTRAINT     u   ALTER TABLE ONLY public.habit_verification
    ADD CONSTRAINT habit_verification_pkey PRIMARY KEY (verification_id);
 T   ALTER TABLE ONLY public.habit_verification DROP CONSTRAINT habit_verification_pkey;
       public            postgres    false    232            �           2606    16759    habits habits_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.habits
    ADD CONSTRAINT habits_pkey PRIMARY KEY (habit_id);
 <   ALTER TABLE ONLY public.habits DROP CONSTRAINT habits_pkey;
       public            postgres    false    230            �           2606    16629    likes likes_unique 
   CONSTRAINT     Y   ALTER TABLE ONLY public.likes
    ADD CONSTRAINT likes_unique UNIQUE (post_id, user_id);
 <   ALTER TABLE ONLY public.likes DROP CONSTRAINT likes_unique;
       public            postgres    false    219    219            �           2606    16900 *   monthly_challenges monthly_challenges_pkey 
   CONSTRAINT     r   ALTER TABLE ONLY public.monthly_challenges
    ADD CONSTRAINT monthly_challenges_pkey PRIMARY KEY (challenge_id);
 T   ALTER TABLE ONLY public.monthly_challenges DROP CONSTRAINT monthly_challenges_pkey;
       public            postgres    false    243            �           2606    16745     notifications notifications_pkey 
   CONSTRAINT     k   ALTER TABLE ONLY public.notifications
    ADD CONSTRAINT notifications_pkey PRIMARY KEY (notification_id);
 J   ALTER TABLE ONLY public.notifications DROP CONSTRAINT notifications_pkey;
       public            postgres    false    228            �           2606    16601    posts posts_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.posts
    ADD CONSTRAINT posts_pkey PRIMARY KEY (post_id);
 :   ALTER TABLE ONLY public.posts DROP CONSTRAINT posts_pkey;
       public            postgres    false    218            �           2606    16877    rewards rewards_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY public.rewards
    ADD CONSTRAINT rewards_pkey PRIMARY KEY (reward_id);
 >   ALTER TABLE ONLY public.rewards DROP CONSTRAINT rewards_pkey;
       public            postgres    false    240            �           2606    16714    stories stories_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.stories
    ADD CONSTRAINT stories_pkey PRIMARY KEY (story_id);
 >   ALTER TABLE ONLY public.stories DROP CONSTRAINT stories_pkey;
       public            postgres    false    225            �           2606    16979    users unique_email 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT unique_email UNIQUE (email);
 <   ALTER TABLE ONLY public.users DROP CONSTRAINT unique_email;
       public            postgres    false    216            �           0    0     CONSTRAINT unique_email ON users    COMMENT     Q   COMMENT ON CONSTRAINT unique_email ON public.users IS 'emails should be unque ';
          public          postgres    false    4763            �           2606    16575    users users_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (user_id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    216            �           2606    16913 *   verification_tasks verification_tasks_pkey 
   CONSTRAINT     m   ALTER TABLE ONLY public.verification_tasks
    ADD CONSTRAINT verification_tasks_pkey PRIMARY KEY (task_id);
 T   ALTER TABLE ONLY public.verification_tasks DROP CONSTRAINT verification_tasks_pkey;
       public            postgres    false    245            �           2606    16825    aok aok_user_id_fkey 
   FK CONSTRAINT     x   ALTER TABLE ONLY public.aok
    ADD CONSTRAINT aok_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(user_id);
 >   ALTER TABLE ONLY public.aok DROP CONSTRAINT aok_user_id_fkey;
       public          postgres    false    216    4765    235            �           2606    16693 +   comment_reply comment_reply_comment_id_fkey 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.comment_reply
    ADD CONSTRAINT comment_reply_comment_id_fkey FOREIGN KEY (comment_id) REFERENCES public.comments(comment_id);
 U   ALTER TABLE ONLY public.comment_reply DROP CONSTRAINT comment_reply_comment_id_fkey;
       public          postgres    false    4771    221    223            �           2606    16698 (   comment_reply comment_reply_user_id_fkey 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.comment_reply
    ADD CONSTRAINT comment_reply_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(user_id);
 R   ALTER TABLE ONLY public.comment_reply DROP CONSTRAINT comment_reply_user_id_fkey;
       public          postgres    false    223    4765    216            �           2606    16672    comments comments_post_id_fkey 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.comments
    ADD CONSTRAINT comments_post_id_fkey FOREIGN KEY (post_id) REFERENCES public.posts(post_id);
 H   ALTER TABLE ONLY public.comments DROP CONSTRAINT comments_post_id_fkey;
       public          postgres    false    218    221    4767            �           2606    16677    comments comments_user_id_fkey 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.comments
    ADD CONSTRAINT comments_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(user_id);
 H   ALTER TABLE ONLY public.comments DROP CONSTRAINT comments_user_id_fkey;
       public          postgres    false    4765    216    221            �           2606    16864 -   current_gwall current_gwall_gratitude_id_fkey 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.current_gwall
    ADD CONSTRAINT current_gwall_gratitude_id_fkey FOREIGN KEY (gratitude_id) REFERENCES public.gratitude_feedback(gratitude_id);
 W   ALTER TABLE ONLY public.current_gwall DROP CONSTRAINT current_gwall_gratitude_id_fkey;
       public          postgres    false    238    237    4785            �           2606    16859 (   current_gwall current_gwall_user_id_fkey 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.current_gwall
    ADD CONSTRAINT current_gwall_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(user_id);
 R   ALTER TABLE ONLY public.current_gwall DROP CONSTRAINT current_gwall_user_id_fkey;
       public          postgres    false    4765    216    238            �           2606    16843 1   gratitude_feedback gratitude_feedback_act_id_fkey 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.gratitude_feedback
    ADD CONSTRAINT gratitude_feedback_act_id_fkey FOREIGN KEY (act_id) REFERENCES public.aok(act_id);
 [   ALTER TABLE ONLY public.gratitude_feedback DROP CONSTRAINT gratitude_feedback_act_id_fkey;
       public          postgres    false    237    235    4783            �           2606    16838 2   gratitude_feedback gratitude_feedback_user_id_fkey 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.gratitude_feedback
    ADD CONSTRAINT gratitude_feedback_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(user_id);
 \   ALTER TABLE ONLY public.gratitude_feedback DROP CONSTRAINT gratitude_feedback_user_id_fkey;
       public          postgres    false    237    4765    216            �           2606    16774 3   habit_verification habit_verification_habit_id_fkey 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.habit_verification
    ADD CONSTRAINT habit_verification_habit_id_fkey FOREIGN KEY (habit_id) REFERENCES public.habits(habit_id);
 ]   ALTER TABLE ONLY public.habit_verification DROP CONSTRAINT habit_verification_habit_id_fkey;
       public          postgres    false    232    4779    230            �           2606    16779 2   habit_verification habit_verification_user_id_fkey 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.habit_verification
    ADD CONSTRAINT habit_verification_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(user_id);
 \   ALTER TABLE ONLY public.habit_verification DROP CONSTRAINT habit_verification_user_id_fkey;
       public          postgres    false    216    4765    232            �           2606    16760    habits habits_user_id_fkey 
   FK CONSTRAINT     ~   ALTER TABLE ONLY public.habits
    ADD CONSTRAINT habits_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(user_id);
 D   ALTER TABLE ONLY public.habits DROP CONSTRAINT habits_user_id_fkey;
       public          postgres    false    4765    230    216            �           2606    16630    likes likes_post_id_fkey 
   FK CONSTRAINT     |   ALTER TABLE ONLY public.likes
    ADD CONSTRAINT likes_post_id_fkey FOREIGN KEY (post_id) REFERENCES public.posts(post_id);
 B   ALTER TABLE ONLY public.likes DROP CONSTRAINT likes_post_id_fkey;
       public          postgres    false    4767    218    219            �           2606    16635    likes likes_user_id_fkey 
   FK CONSTRAINT     |   ALTER TABLE ONLY public.likes
    ADD CONSTRAINT likes_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(user_id);
 B   ALTER TABLE ONLY public.likes DROP CONSTRAINT likes_user_id_fkey;
       public          postgres    false    4765    216    219            �           2606    16901 4   monthly_challenges monthly_challenges_reward_id_fkey 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.monthly_challenges
    ADD CONSTRAINT monthly_challenges_reward_id_fkey FOREIGN KEY (reward_id) REFERENCES public.rewards(reward_id);
 ^   ALTER TABLE ONLY public.monthly_challenges DROP CONSTRAINT monthly_challenges_reward_id_fkey;
       public          postgres    false    4787    240    243            �           2606    16746 ,   notifications notifications_receiver_id_fkey 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.notifications
    ADD CONSTRAINT notifications_receiver_id_fkey FOREIGN KEY (receiver_id) REFERENCES public.users(user_id);
 V   ALTER TABLE ONLY public.notifications DROP CONSTRAINT notifications_receiver_id_fkey;
       public          postgres    false    228    216    4765            �           2606    16602    posts posts_user_id_fkey 
   FK CONSTRAINT     |   ALTER TABLE ONLY public.posts
    ADD CONSTRAINT posts_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(user_id);
 B   ALTER TABLE ONLY public.posts DROP CONSTRAINT posts_user_id_fkey;
       public          postgres    false    216    218    4765            �           2606    16715    stories stories_user_id_fkey 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.stories
    ADD CONSTRAINT stories_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(user_id);
 F   ALTER TABLE ONLY public.stories DROP CONSTRAINT stories_user_id_fkey;
       public          postgres    false    4765    225    216            �           2606    16725 '   story_viewed story_viewed_story_id_fkey 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.story_viewed
    ADD CONSTRAINT story_viewed_story_id_fkey FOREIGN KEY (story_id) REFERENCES public.stories(story_id);
 Q   ALTER TABLE ONLY public.story_viewed DROP CONSTRAINT story_viewed_story_id_fkey;
       public          postgres    false    225    226    4775            �           2606    16730 &   story_viewed story_viewed_user_id_fkey 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.story_viewed
    ADD CONSTRAINT story_viewed_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(user_id);
 P   ALTER TABLE ONLY public.story_viewed DROP CONSTRAINT story_viewed_user_id_fkey;
       public          postgres    false    216    226    4765            �           2606    16887 &   user_reward user_reward_reward_id_fkey 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.user_reward
    ADD CONSTRAINT user_reward_reward_id_fkey FOREIGN KEY (reward_id) REFERENCES public.rewards(reward_id);
 P   ALTER TABLE ONLY public.user_reward DROP CONSTRAINT user_reward_reward_id_fkey;
       public          postgres    false    4787    241    240            �           2606    16882 $   user_reward user_reward_user_id_fkey 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.user_reward
    ADD CONSTRAINT user_reward_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(user_id);
 N   ALTER TABLE ONLY public.user_reward DROP CONSTRAINT user_reward_user_id_fkey;
       public          postgres    false    241    4765    216            �           2606    16788 0   verification_club verification_club_user_id_fkey 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.verification_club
    ADD CONSTRAINT verification_club_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(user_id);
 Z   ALTER TABLE ONLY public.verification_club DROP CONSTRAINT verification_club_user_id_fkey;
       public          postgres    false    4765    233    216            �           2606    16793 4   verification_club verification_club_verifier_id_fkey 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.verification_club
    ADD CONSTRAINT verification_club_verifier_id_fkey FOREIGN KEY (verifier_id) REFERENCES public.users(user_id);
 ^   ALTER TABLE ONLY public.verification_club DROP CONSTRAINT verification_club_verifier_id_fkey;
       public          postgres    false    4765    233    216            �           2606    16919 7   verification_tasks verification_tasks_applicant_id_fkey 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.verification_tasks
    ADD CONSTRAINT verification_tasks_applicant_id_fkey FOREIGN KEY (applicant_id) REFERENCES public.users(user_id);
 a   ALTER TABLE ONLY public.verification_tasks DROP CONSTRAINT verification_tasks_applicant_id_fkey;
       public          postgres    false    245    4765    216            �           2606    16924 3   verification_tasks verification_tasks_habit_id_fkey 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.verification_tasks
    ADD CONSTRAINT verification_tasks_habit_id_fkey FOREIGN KEY (habit_id) REFERENCES public.habits(habit_id);
 ]   ALTER TABLE ONLY public.verification_tasks DROP CONSTRAINT verification_tasks_habit_id_fkey;
       public          postgres    false    4779    230    245            �           2606    16914 6   verification_tasks verification_tasks_verifier_id_fkey 
   FK CONSTRAINT     �   ALTER TABLE ONLY public.verification_tasks
    ADD CONSTRAINT verification_tasks_verifier_id_fkey FOREIGN KEY (verifier_id) REFERENCES public.users(user_id);
 `   ALTER TABLE ONLY public.verification_tasks DROP CONSTRAINT verification_tasks_verifier_id_fkey;
       public          postgres    false    245    4765    216            w   
   x������ � �      k   
   x������ � �      i   �   x�e�Kn� �9�/0lI��
Ӣ�A���z�fXf$[���! L��q����xȐ<=�����6b�uJlc[�N���_��5�wɃ���w&(�&-�GJ3���K�@w���Qr���j��5/�c_�*���W� ��>'���	�x�+m�-�q�)f��#<֝���v��+��y<����9��Yt=����J��xS4      z   
   x������ � �      y   
   x������ � �      t   
   x������ � �      r   
   x������ � �      g   
   x������ � �         
   x������ � �      p   
   x������ � �      f   �  x�m��n�8�;O�}�1DJ�(?K����mb�tw�~�nә��l�;���ƹ�e"dr}$�S�\�Wu$d۷Ӿ��G9���Q������E���/�]G�׺�����/;�x�g�I5�D^я����q:L�ތ:����3	�ж,���)�e��q�Jd/�/�lD�4j���1��y��N�i��ò_�X������z�|��{��� �'+�!h"��EV����2�q:�'h/��m��țk�D+��X�mH(6�<0�qM�8��R�f�̳����{��*jX���~ꑱ�y�[a	�[)��G�zN�(	�jڒi\�N��z��jN��u1�?=�噊tHm�D��TqvS��͎{�r,ʨ�6�����f,�@�N���e�2 c�����}�T4g���$㰲���"Jg�s�C�~#�7��ϽXH1&��:u%���$�}��>�}# �R��@�Y�:���#������K�mH���B}��'�\��Ҩ�C��s �WsZ.�'`r������+Я�Ԁ����T���H��ϑ�\
��'2P�Q:��,o�m���P״�VQɪ��J���fx�l��v{9���k����_a�
�L��7�F�������<x����7���]p�kveCvB�gG����	��+�᎘\.�~�K?T���;[U��u��6s/�n��gaR,      |   
   x������ � �      m   
   x������ � �      n   
   x������ � �      }   
   x������ � �      d   �  x���_S�Jş'�"�j_�ff��\Ե�����I&N?����z�쭢�V����t�.�*E'��{�\�o<aQl�"A��sL(Z��s=��,2J�zʷz�����IH��
l#���^�o-%	�	iZ�I�A��*��R���X�ӜK�\HE��A�8
9'Q�BLi#W�
�e;�9���XK�K��:�X^�,���Jb)Y�*+z�
JL ��i7�o�� ��CK1��(j��*d.R�����7����l4��J_r�P�b�Jy��*FUI�0�6�T0`� ����h:�0t�qĒ�
3���F��au`�
��l�c���Qx��U���I�;�͊��Т�(�
��Oh D��H*��mC�d�k�~��"�X�Y$�@��ʡ�60P��
E��DL3E�9�2�6��<G�:@���q1�H����B���˷�|�
�X���I����Ί�8�-�6E��d��q"1E`
kE]���I=�Y�:1�E)V�~�ZI_x����4�Si�l��v
ʫ�QT�7�O�su���,_E"�����yQ�\b�\ֈ�"��n����V�=�2s�bg6ۡi>05睘��(m�J�Kma������n�e�>�~�U�?]H���p�L�B� ��I��@�i$J~<S�*��"��:-�k1����
�Q�ul1+��a�*���ш�r�d�LY«S̿-����H_���.����j̽?����4�&Ɔ�m��P���>;�R#.�m��\������(��h�����j�,u�^�$!�^�~zտr����\xgH��n�EuY�O��o�kbb8��]��=�����
�ꍾ��6����f�t��S�v',�/O��=��u\L���-:'����n���}/���M�6-�pLJ=��[fHEܶ��ռ._Y���֞.���8�	��7�p����n�����z�W��R\ߦ�߰�M�3LӲ ��l���:�Nj#���33�?䡰i��;Yv�����p�jw�cH���ҝ��[9}z�ƁWJq�}<�߶�-�x�F�_��H�0m�w��V0�i��^G���yq�Q�=��}��ݐ������iO6�͂;kc<?�OI�����3����t�/����@BX}÷<˱j�
FͶF)J��eK�U$����+"6�!��ݾNGw���rc<���Y�}�ʶn���(���Z�w�,�,�EŎj?v
j��BQ(�/CӴ��8�      u   
   x������ � �      �   
   x������ � �     