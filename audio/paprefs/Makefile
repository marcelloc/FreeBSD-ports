# Created by: Romain Tartière <romain@blogreen.org>
# $FreeBSD$

PORTNAME=	paprefs
PORTVERSION=	0.9.10
CATEGORIES=	audio
MASTER_SITES=	http://freedesktop.org/software/pulseaudio/${PORTNAME}/

MAINTAINER=	romain@FreeBSD.org
COMMENT=	GTK configuration dialog for PulseAudio

LIB_DEPENDS=	libglademm-2.4.so:${PORTSDIR}/devel/libglademm24 \
		libpulse.so:${PORTSDIR}/audio/pulseaudio

GNU_CONFIGURE=	yes
CPPFLAGS+=	-I${LOCALBASE}/include
LIBS+=		-L${LOCALBASE}/lib
USES=		gmake pkgconfig
USE_GNOME=	gconfmm26 gnomeprefix intltool

CONFIGURE_ARGS=	--disable-lynx

OPTIONS_DEFINE=	PK NLS
OPTIONS_SUB=	yes
PK_DESC=	Force dependency on PackageKit

PK_LIB_DEPENDS=	libpackagekit-glib2.so:${PORTSDIR}/ports-mgmt/packagekit

NLS_USES=		gettext
NLS_CONFIGURE_ENABLE=	nls

.include <bsd.port.mk>
