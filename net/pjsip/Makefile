# $FreeBSD$

PORTNAME=	pjsip
PORTVERSION=	2.3
PORTREVISION=	4
CATEGORIES=	net
MASTER_SITES=	http://www.pjsip.org/release/${PORTVERSION}/
DISTNAME=	pjproject-${DISTVERSION}

MAINTAINER=	madpilot@FreeBSD.org
COMMENT=	Multimedia communication library written in C language

LICENSE=	GPLv2

LIB_DEPENDS=	libportaudio.so:${PORTSDIR}/audio/portaudio

CONFLICTS=	pjsip-extsrtp-[0-9]*

GNU_CONFIGURE=	yes
CONFIGURE_ARGS=	--with-external-pa \
		--disable-silk
USES=		gmake tar:bz2
USE_LDCONFIG=	yes
PLIST_SUB=	CONFIGURE_TARGET="${CONFIGURE_TARGET}"
LDFLAGS+=	-L${LOCALBASE}/lib
CFLAGS+=	-I${LOCALBASE}/include
MAKE_JOBS_UNSAFE=	yes

OPTIONS_DEFINE=	FFMPEG G711 G722 G7221 GSM ILBC L16 OPENH264 RESAMPLE RESAMPLEDLL \
		SAMPLERATE SDL SHARED SPEEX SPEEXAEC V4L IPV6 SOUND VIDEO AMR EXTSRTP
OPTIONS_DEFAULT=G711 G722 G7221 GSM ILBC L16 SHARED SPEEX SPEEXAEC

G711_DESC=	G.711 codec support
G722_DESC=	G.722 codec support
G7221_DESC=	G.722.1 codec support
ILBC_DESC=	iLBC codec support
L16_DESC=	Linear/L16 codec support
OPENH264_DESC=	OpenH264 support
RESAMPLE_DESC=	Enable resampling implementations
RESAMPLEDLL_DESC=	Build libresample as shared library
SHARED_DESC=	Build shared libraries (other ports may depend on this)
SPEEXAEC_DESC=	Speex Acoustic Echo Canceller/AEC
V4L_DESC=	Video4Linux2 support
YUV_DESC=	Libyuv support
EXTSRTP_DESC=	Use libsrtp port (needed to get SRTP support in asterisk13 pjsip backend)

OPTIONS_SUB=	yes

FFMPEG_CONFIGURE_ENABLE=	ffmpeg
FFMPEG_LIB_DEPENDS=		libswresample.so:${PORTSDIR}/multimedia/ffmpeg
G711_CONFIGURE_ENABLE=		g711-codec
G722_CONFIGURE_ENABLE=		g722-codec
G7221_CONFIGURE_ENABLE=		g7221-codec
GSM_CONFIGURE_ENABLE=		gsm-codec
GSM_LIB_DEPENDS=		libgsm.so:${PORTSDIR}/audio/gsm
GSM_CONFIGURE_ON=		--with-external-gsm
ILBC_CONFIGURE_ENABLE=		ilbc-codec
L16_CONFIGURE_ENABLE=		l16-codec
OPENH264_CONFIGURE_ENABLE=	openh264
OPENH264_LIB_DEPENDS=		libopenh264.so:${PORTSDIR}/multimedia/openh264
RESAMPLE_CONFIGURE_ENABLE=	resample
RESAMPLEDLL_CONFIGURE_ENABLE=	resample-dll
SAMPLERATE_CONFIGURE_ENABLE=	libsamplerate
SAMPLERATE_LIB_DEPENDS=		libsamplerate.so:${PORTSDIR}/audio/libsamplerate
SDL_CONFIGURE_ENABLE=		sdl
SDL_USE=			SDL=sdl
SHARED_CONFIGURE_ENABLE=	shared
SPEEX_CONFIGURE_ENABLE=		speex-codec
SPEEX_CONFIGURE_ON=		--with-external-speex
SPEEX_LIB_DEPENDS=		libspeex.so:${PORTSDIR}/audio/speex
SPEEXAEC_CONFIGURE_ENABLE=	speex-aec
V4L_CONFIGURE_ENABLE=		v4l2
V4L_BUILD_DEPENDS=		v4l_compat>=0:${PORTSDIR}/multimedia/v4l_compat
V4L_LIB_DEPENDS=		libv4l2.so:${PORTSDIR}/multimedia/libv4l
IPV6_CFLAGS=			"-DPJ_HAS_IPV6=1"
SOUND_CONFIGURE_ENABLE=		sound
VIDEO_CONFIGURE_ENABLE=		video
AMR_CONFIGURE_WITH=		opencore-amr
AMR_LIB_DEPENDS=		libopencore-amrwb.so:${PORTSDIR}/audio/opencore-amr \
				libvo-amrwbenc.so:${PORTSDIR}/audio/vo-amrwbenc
EXTSRTP_CONFIGURE_WITH=		external-srtp
EXTSRTP_LIB_DEPENDS=		libsrtp.so:${PORTSDIR}/net/libsrtp

post-patch:
	@${REINPLACE_CMD} -e 's|%%LOCALBASE%%|${LOCALBASE}|' \
		${WRKSRC}/pkgconfig.py

.include <bsd.port.mk>
